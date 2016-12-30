<?php
namespace App\Http\Controllers\Backend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\University;
use File;
use DB;
use Html;
use Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;
class UniversityController extends Controller
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
$pageheader = 'List of Institute Type';
$universities = University::get();
return view('backend.collegemanagement.university.list',compact('pageheader','universities'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
//
$pageheader = 'Create Country';
return view('backend.collegemanagement.university.create',compact('pageheader'));
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
);
$validator = Validator::make(Input::all(), $rules);
if($validator->fails())
{
return Redirect::to('admin/university/create')
->withErrors($validator);
}
else
{
$inputs = Input::all();
foreach( $inputs['counter'] as $key=>$input )
{
$title = $inputs['title'][$key];
University::create([
'university_name' => $title,
'slug' => str_replace(' ', '-', strtolower($title)),
]);
}
return redirect('admin/university');
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
$pageheader = 'Edit University';
$universities = University::where('u_id',$id)->first();
return view('backend.collegemanagement.university.edit',compact('pageheader','universities'));
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
return Redirect::to('admin/university/edit'.$id)
->withErrors($validator);
}
else
{
$inputs = Input::all();
$title = $inputs['title'];
DB::table('universities')
->where('u_id', $id)
->update([
'university_name' => $title,
'slug' => str_replace(' ', '-', strtolower($title)),
]);
return Redirect::to('admin/university');
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
DB::table('universities')->where('u_id', '=', $id)->delete();
return Redirect::to('admin/university');
}
}