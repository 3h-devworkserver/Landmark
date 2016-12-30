<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\CollegeTab;
use App\Models\University;
use App\Models\Slider;
use App\Models\Course;
use App\Models\Locations;
use File;
use DB;
use Html;
use Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;

class CollegeController extends Controller
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
        $pageheader = 'List of College';
        $college = College::get();
        return view('backend.collegemanagement.college.list',compact('pageheader','college'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageheader = 'Create College';
        $universities = University::get();
        $courses = Course::get();
        $locations = Locations::get();
        $sliders = Slider::groupBy('sliderid')->get();
        return view('backend.collegemanagement.college.create',compact('pageheader','universities','sliders','courses','locations'));
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
'institute' => 'required',
);
$messages = [
    'name.*' => 'The college name is required.',
    'institute' => 'Select institution type.',
];

$validator = Validator::make(Input::all(), $rules, $messages);
if($validator->fails())
{
return Redirect::to('admin/college/create')
->withErrors($validator);
}
else
{
$inputs = Input::all();
                   foreach( $inputs['counter'] as $key=>$input )
                   {
                        $title = $inputs['name'][$key];
                        $uid = $inputs['institute'];
                        //$cid = $inputs['course'][$key];
                        $sid = $inputs['slider'][$key];
                        $description = $inputs['content'][$key];
                        //$coursedesc = $inputs['coursecontent'][$key];
                        $contact = $inputs['contact'][$key];
                        $url = $inputs['url'][$key];
                        $location = $inputs['location'][$key];
                        if(Input::hasFile('upload'))
                        {
                            $file = Input::file('upload');
                            $destinationPath = public_path(). '/img/college/';
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
                        if(Input::hasFile('uploadheader'))
                        {
                            $hfile = Input::file('uploadheader');
                            $destinationPath = public_path(). '/img/college/';
                            if( !empty( $hfile[$key] ) ){
                             $hfilename = $hfile[$key]->getClientOriginalName();
                             $hfile[$key]->move( $destinationPath, $hfilename );
                            }else{
                                $hfilename = '';
                            }
                        }
                        else
                        {
                            $hfilename = '';
                        }
                        $slug = str_replace(' ', '-', strtolower( $title ) );
                        $newslug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug); 
                        College::create([
                                'college_name' => $title,
                                'uni_id' => $uid,
                                'course_id' => '',
                                'slider_id' => $sid,
                                'college_detail' => $description,
                                'course_detail' => '',
                                'images' => $filename,
                                'header_image' => $hfilename,
                                'url' => $url,
                                'location' => $location,
                                'contact' => $contact,
                                'slug' => $newslug,
                                ]);
                    }
                    return redirect('admin/college');
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
        $pageheader = 'Edit College';
        $universities = University::get();
        $courses = Course::get();
        $locations = Locations::get();
        $sliders = Slider::groupBy('sliderid')->get();
        $colleges = College::where( 'collegeid', $id )->first();
        return view( 'backend.collegemanagement.college.edit', compact( 'pageheader','universities','locations','colleges','courses', 'sliders') );
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
                return Redirect::to('admin/college/edit'.$id)
                ->withErrors($validator);
            }
            else
            {
                        $inputs = Input::all();
                        $title = $inputs['title'];
                        $uid = $inputs['university'];
                        //$cid = $inputs['course'];
                        $sid = $inputs['slider'];
                        $description = $inputs['content'];
                        //$coursedesc = $inputs['coursecontent'];
                        $contact = $inputs['contact'];
                        $url = $inputs['url'];
                        $location = $inputs['location'];
                        $filenames = DB::table('college_details')->select('images','header_image')->where('collegeid',$id)->first();
                        if(Input::hasFile('upload'))
                        {
                            $file = Input::file('upload');
                            $destinationPath = public_path(). '/img/college/';
                             $filename = $file->getClientOriginalName();
                             $file->move($destinationPath, $filename);
                           
                        }
                        else
                        {
                            $filename = $filenames->images;
                        }

                        if(Input::hasFile('uploadheader'))
                        {
                            $hfile = Input::file('uploadheader');
                            $destinationPath = public_path(). '/img/college/';
                             $headername = $hfile->getClientOriginalName();
                             $hfile->move($destinationPath, $headername);
                        
                        }
                        else
                        {
                            $headername = $filenames->header_image;
                        }
                        $slug = str_replace(' ', '-', strtolower( $title ) );
                        $newslug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug); 
                     DB::table('college_details')
                        ->where('collegeid', $id)
                        ->update([
                                'college_name' => $title,
                                'uni_id' => $uid,
                                'course_id' => '',
                                'slider_id' => $sid,
                                'college_detail' => $description,
                                'course_detail' => '',
                                'images' => $filename,
                                'header_image' => $headername,
                                'url' => $url,
                                'location' => $location,
                                'contact' => $contact,
                                'slug' => $newslug,
                            ]);
                return Redirect::to('admin/college');
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
        DB::table('college_details')->where('collegeid', '=', $id)->delete();
        return Redirect::to('admin/college');
    }



    /* Tab Structure */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indextab()
    {
        //
        $pageheader = 'List of College Tab';
        $collegetab = CollegeTab::get();
        return view('backend.collegemanagement.college.tablist',compact('pageheader','collegetab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createtab()
    {
        //
        $pageheader = 'Create College Tab';
        $colleges = College::get();
        return view('backend.collegemanagement.college.tabcreate',compact('pageheader','colleges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storetab(Request $request)
    {
        //
 
$rules = array(
'title.*' => 'required' ,
'college' => 'required',
);
$messages = [
    'title.*' => 'The title is required.',
    'college' => 'Select institution type.',
];

$validator = Validator::make(Input::all(), $rules, $messages);
if($validator->fails())
{
return Redirect::to('admin/collegetab/create')
->withErrors($validator);
}
else
{
$inputs = Input::all();
                   foreach( $inputs['counter'] as $key=>$input )
                   {
                        $title = $inputs['title'][$key];
                        $cid = $inputs['college'];
                        $content = $inputs['content'][$key];
                        CollegeTab::create([
                                'clz_id' => $cid,
                                'title' => $title,
                                'content' => $content,
                                'slug' => str_replace(' ', '-', strtolower( $title ) ),
                                ]);
                    }
                    return redirect('admin/collegetab');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showtab($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edittab($id)
    {
        //
        $pageheader = 'Edit College Tab';
        $colleges = College::get();
        $collegetabs = CollegeTab::where( 'id', $id )->first();
        return view( 'backend.collegemanagement.college.tabedit', compact( 'pageheader','colleges','collegetabs') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatetab(Request $request, $id)
    {
        //
        //
            $rules = array(
            'title' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/collegetab/edit'.$id)
                ->withErrors($validator);
            }
            else
            {
                        $inputs = Input::all();
                        $title = $inputs['title'];
                        $cid = $inputs['college'];
                        $content = $inputs['content'];
                        
                    
                     DB::table('college_tabs')
                        ->where('id', $id)
                        ->update([
                                'clz_id' => $cid,
                                'title' => $title,
                                'content' => $content,
                                'slug' => str_replace(' ', '-', strtolower( $title ) ),
                            ]);
                return Redirect::to('admin/collegetab');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroytab($id)
    {
        //
        DB::table('college_tabs')->where('id', '=', $id)->delete();
        return Redirect::to('admin/collegetab');
    }
}
