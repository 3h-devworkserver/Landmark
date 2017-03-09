<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Locations;
use File;
use DB;
use Html;
use Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //
        $pageheader = 'Locaton List';
        $locations = Locations::get();
        return view('backend.collegemanagement.locations.list',compact('pageheader','locations'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageheader = 'Create Location';
        return view('backend.collegemanagement.locations.create',compact('pageheader'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            $rules = array(
                'name.*' => 'required' ,
            );
            $messages = [
                'name.*' => 'The name field is required.',
            ];

            $validator = Validator::make(Input::all(), $rules, $messages);
            if($validator->fails())
            {
                return Redirect::to('admin/location/create')
                ->withErrors($validator);
            }
            else
            {
                $inputs = Input::all();
                   foreach( $inputs['counter'] as $key => $input )
                   {
                        $title = $inputs['name'][$key];
                        if($inputs['slug'][$key] == ''){
                            $slug = str_replace(' ', '-', strtolower( $title ) );
                            $newslug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug); 
                        }else{
                            $newslug = $inputs['slug'][$key];
                        }
                        Locations::create([
                                'name' => $title,
                                'slug' => $newslug,
                                ]);
                    }
                    return redirect('admin/location');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pageheader = 'Edit Location';
        $locations = Locations::where( 'id', $id )->first();
        return view( 'backend.collegemanagement.locations.edit', compact( 'pageheader','locations') );
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            $rules = array(
            'name' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/location/edit/'.$id)
                ->withInput()
                ->withErrors($validator);
            }
            else
            {
                        $inputs = Input::all();
                        $title = $inputs['name'];
                        $newslug = $inputs['slug'];
                       
                        Locations::where('id', $id)
                            ->update([
                                'name' => $title,
                                'slug' => $newslug,
                            ]);
                return Redirect::to('admin/location');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Locations::where('id', '=', $id)->delete();
        return Redirect::to('admin/location');
    }
}
