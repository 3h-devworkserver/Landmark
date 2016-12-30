<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Input;
use Illuminate\Support\Facades\Redirect;
use DB;

class ContactController extends Controller
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
        $pageheader = 'Contact List';
        $contacts = Contact::get();
        return view('backend.contact.index',compact('pageheader','contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageheader = 'Create Contact';
        return view('backend.contact.create',compact('pageheader'));
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
        $input = Input::all();
        Contact::create([
                        'title' => $input['title'],
                        'office_name' => $input['office'],
                        'address' => $input['address'],
                        'phone' => $input['phone'],
                        'email' => $input['email'],
                       
                        ]);
            return Redirect::to('contact');
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
        $pageheader = "Edit Contact";
        $contact = DB::table('contacts')->select('*')->where('id',$id)->first();

        return view('backend.contact.edit',compact('contact','pageheader'));
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
        DB::table('contacts')
                    ->where('id', $id)
                    ->update([
                        'title' => $input['title'],
                        'office_name' => $input['office'],
                        'address' => $input['address'],
                        'phone' => $input['phone'],
                        'email' => $input['email'],
                        ]);
        return Redirect::to('contact');
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
        DB::table('contacts')->where('id', '=', $id)->delete();
        return Redirect::to('contact');
    }
}
