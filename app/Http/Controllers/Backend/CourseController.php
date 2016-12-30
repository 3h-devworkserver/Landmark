<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Course;
use App\Models\CourseTab;
use App\Models\CourseLevel;
use File;
use DB;
use Html;
use Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;


class CourseController extends Controller
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
        $pageheader = 'List of Courses';
        $courses = Course::get();
        return view('backend.collegemanagement.course.list',compact('pageheader','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageheader = 'Create Course';
        $colleges = College::get();
        $courselevel = CourseLevel::get();
        return view('backend.collegemanagement.course.create',compact('pageheader','colleges','courselevel'));
   
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
'course.*' => 'required' ,
'college' => 'required',
'courselevel' => 'required',
);
$messages = [
    'course.*' => 'The course name is required.',
    'college' => 'Please select college.',
    'courselevel' => 'Please select course level.',
];

$validator = Validator::make(Input::all(), $rules, $messages);
if($validator->fails())
{
return Redirect::to('admin/course/create')
->withErrors($validator);
}
else
{
$inputs = Input::all();
     $title = $inputs['course'];
                        $cid = $inputs['college'];
                        $clz = implode(',', $cid);
                        $courselevel = $inputs['courselevel'];
                        $coursedesc = $inputs['details'];
                        $subjects = $inputs['subjects'];
                        if(Input::hasFile('upload'))
                        {
                            $file = Input::file('upload');
                            $destinationPath = public_path(). '/img/course/';
                             $filename = $file->getClientOriginalName();
                             $file->move($destinationPath, $filename);
                        }
                        else
                        {
                            $filename = '';
                        }
                        if(Input::hasFile('uploadheader'))
                        {
                            $hfile = Input::file('uploadheader');
                            $destinationPath = public_path(). '/img/course/';
                             $hfilename = $hfile->getClientOriginalName();
                             $hfile->move( $destinationPath, $hfilename );
                                $hfilename = '';
                        }
                        else
                        {
                            $hfilename = '';
                        }

                            Course::create([
                                'college_id' => $clz,
                                'level_id' => $courselevel,
                                'course_name' => $title,
                                'course_detail' => $coursedesc,
                                'subjects' => $subjects,
                                'images' => $filename,
                                'header_image' => $hfilename,
                                'slug' => str_replace(' ', '-', strtolower( $title ) ),
                                ]);
                   // foreach( $inputs['counter'] as $key=>$input )
                   // {
                   //      $title = $inputs['course'][$key];
                   //      $cid = $inputs['college'][$key];
                   //      $coursedesc = $inputs['details'][$key];
                   //      if(Input::hasFile('upload'))
                   //      {
                   //          $file = Input::file('upload');
                   //          $destinationPath = public_path(). '/img/course/';
                   //          if( !empty( $file[$key] ) ){
                   //           $filename = $file[$key]->getClientOriginalName();
                   //           $file[$key]->move($destinationPath, $filename);
                   //          }else{
                   //              $filename = '';
                   //          }
                   //      }
                   //      else
                   //      {
                   //          $filename = '';
                   //      }
                   //      if(Input::hasFile('uploadheader'))
                   //      {
                   //          $hfile = Input::file('uploadheader');
                   //          $destinationPath = public_path(). '/img/course/';
                   //          if( !empty( $hfile[$key] ) ){
                   //           $hfilename = $hfile[$key]->getClientOriginalName();
                   //           $hfile[$key]->move( $destinationPath, $hfilename );
                   //          }else{
                   //              $hfilename = '';
                   //          }
                   //      }
                   //      else
                   //      {
                   //          $hfilename = '';
                   //      }
                   //      College::create([
                   //              'college_id' => $cid,
                   //              'course_name' => $title,
                   //              'course_detail' => $coursedesc,
                   //              'images' => $filename,
                   //              'header_image' => $hfilename,
                   //              'slug' => str_replace(' ', '-', strtolower( $title ) ),
                   //              ]);
                   //  }
                    return redirect('admin/course');
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
        $pageheader = 'Edit Course';
        $colleges = College::get();
        $courselevel = CourseLevel::get();
        $course = Course::where('id',$id)->first();
        return view('backend.collegemanagement.course.edit',compact('pageheader','colleges','course','courselevel'));
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
            'course' => 'required',
            'college' => 'required',
            'courselevel' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/course/edit'.$id)
                ->withErrors($validator);
            }
            else
            {
                        $inputs = Input::all();
                        $title = $inputs['course'];
                        $cid = $inputs['college'];
                        $clz = implode(',', $cid);
                        $courselevel = $inputs['courselevel'];
                        $coursedesc = $inputs['details'];
                        $subjects = $inputs['subjects'];

                        $filenames = DB::table('course_details')->select('images','header_image')->where('id',$id)->first();
                        if(Input::hasFile('upload'))
                        {
                            $file = Input::file('upload');
                            $destinationPath = public_path(). '/img/course/';
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
                            $destinationPath = public_path(). '/img/course/';
                             $headername = $hfile->getClientOriginalName();
                             $hfile->move($destinationPath, $headername);
                        
                        }
                        else
                        {
                            $headername = $filenames->header_image;
                        }
                     DB::table('course_details')
                        ->where('id', $id)
                        ->update([
                                'college_id' => $clz,
                                'level_id' => $courselevel,
                                'course_name' => $title,
                                'course_detail' => $coursedesc,
                                'subjects' => $subjects,
                                'images' => $filename,
                                'header_image' => $headername,
                                'slug' => str_replace(' ', '-', strtolower( $title ) ),
                              ]);
                return Redirect::to('admin/course');
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
        DB::table('course_details')->where('id', '=', $id)->delete();
        return Redirect::to('admin/course');
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
        $pageheader = 'List of Course Tab';
        $coursetab = CourseTab::get();
        return view('backend.collegemanagement.course.tablist',compact('pageheader','coursetab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createtab()
    {
        //
        $pageheader = 'Create Course Tab';
        $colleges = College::get();
        $courses = Course::get();
        return view('backend.collegemanagement.course.tabcreate',compact('pageheader','colleges','courses'));
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
'course' => 'required',
);
$messages = [
    'title.*' => 'The title is required.',
    'college' => 'Please select college name.',
    'course' => 'Please select course name.',
];

$validator = Validator::make(Input::all(), $rules, $messages);
if($validator->fails())
{
return Redirect::to('admin/coursetab/create')
->withErrors($validator);
}
else
{
$inputs = Input::all();
                   foreach( $inputs['counter'] as $key=>$input )
                   {
                        $title = $inputs['title'][$key];
                        $colid = $inputs['college'];
                        $coid = $inputs['course'];
                        $content = $inputs['content'][$key];
                        CourseTab::create([
                                'course_id' => $coid,
                                'college_id' => $colid,
                                'title' => $title,
                                'content' => $content,
                                'slug' => str_replace(' ', '-', strtolower( $title ) ),
                                ]);
                    }
                    return redirect('admin/coursetab');
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
        $courses = Course::get();
        $coursetab = CourseTab::where( 'id', $id )->first();
        return view( 'backend.collegemanagement.course.tabedit', compact( 'pageheader','colleges','coursetab','courses') );
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
            'college' => 'required',
            'course' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/coursetab/edit'.$id)
                ->withErrors($validator);
            }
            else
            {
                        $inputs = Input::all();
                        $title = $inputs['title'];
                        $colid = $inputs['college'];
                        $coid = $inputs['course'];
                        $content = $inputs['content'];
                        
                    
                     DB::table('college_tabs')
                        ->where('id', $id)
                        ->update([
                                'course_id' => $coid,
                                'college_id' => $colid,
                                'title' => $title,
                                'content' => $content,
                                'slug' => str_replace(' ', '-', strtolower( $title ) ),
                            ]);
                return Redirect::to('admin/coursetab');
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
        DB::table('course_tabs')->where('id', '=', $id)->delete();
        return Redirect::to('admin/coursetab');
    }
}
