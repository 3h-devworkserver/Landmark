<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CountryUniversity;
use File;
use DB;
use Html;
use Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;

class CountryUniversityController extends Controller
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
         $pageheader = 'List Country University';
        $countries = CountryUniversity::get();
        return view('backend.country.universities.list',compact('pageheader','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageheader = 'Create Country University';
        $countries = Country::get();
        return view('backend.country.universities.create',compact('pageheader','countries'));
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
            'title' => 'required',
            'country' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/country/universities/create')
                ->withErrors($validator);
            }
            else
            {
                 $inputs = Input::all();
                 $cid = $inputs['country'];
                   foreach( $inputs['counter'] as $key=>$input )
                   {
                        $title = $inputs['title'][$key];
                         if(Input::hasFile('upload'))
                        {
                            $file = Input::file('upload');
                            $destinationPath = public_path(). '/img/country/university/';
                            if( !empty( $file[$key] ) ){
                             $filename = $file[$key]->getClientOriginalName();
                             $file[$key]->move($destinationPath, $filename);
                            }else{
                                $filename = '';
                            }
                        }
                        else
                        {
                            $filename = '';
                        }

                        CountryUniversity::create([
                                'title' => $title,
                                'c_id' => $cid,
                                'image' => $filename,
                                'url' => str_replace(' ', '-', strtolower($title)),
                                ]);
                    }
                    return redirect('admin/country/universities');
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
        $pageheader = 'Edit Country Menu';
            $countries = Country::get();
            $countriesuniversity = CountryUniversity::where('id',$id)->first();
            return view('backend.country.menu.edit',compact('pageheader','countries','countriesuniversity'));
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
            'title' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/country/menu/edit'.$id)
                ->withErrors($validator);
            }
            else
            {
                $inputs = Input::all();
                  //echo '<pre>'; print_r($inputs); die();
                    $title = $inputs['title'];
                    $cid = $inputs['country'];
                           $filenames = DB::table('country_university')->select('image')->where('id',$id)->first();
                        if(Input::hasFile('upload'))
                        {
                            $file = Input::file('upload');
                            $destinationPath = public_path(). '/img/country/university/';
                             $filename = $file->getClientOriginalName();
                             $file->move($destinationPath, $filename);
                           
                        }
                        else
                        {
                            $filename = $filenames->image;
                        }

                        
                     DB::table('country_university')
                        ->where('id', $id)
                        ->update([
                            'title' => $title,
                            'c_id' => $cid,
                            'image' => $filename,
                            'url' => str_replace(' ', '-', strtolower($title)),
                            ]);
                return Redirect::to('admin/country/universities');
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
        DB::table('country_university')->where('id', '=', $id)->delete();
        return Redirect::to('admin/country/universities');
    }
}
