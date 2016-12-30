<?php

namespace App\Http\Controllers\Frontend;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use URL;
use App\Models\CourseLevel;
use App\Models\University;
use App\Models\Course;
use App\Models\Locations;
use App\Social;
use DB;

class SearchController extends Controller
{
    //
     public function index()
    {
        //
        $slug = '';
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        $metavalues = DB::table('seos')->first();
        $sociallink = Social::first();
        $courselevel = CourseLevel::get();
        $locations = Locations::get();
        $types = University::get();
        $courses = Course::get();
        return view('frontend.course.searchform',compact('metavalues','slug','menus','home','sociallink','courselevel','locations','types','courses'))->withClass('search');
    }

     public function show(Request $request)
    {
        //
        $keyword = Request::get('keyword');
        $level = Request::get('level');
        $location = Request::get('location');
        $course = Request::get('study_field');
        $type = Request::get('institution_type');
        $courses = Course::query();
        $courses->join('college_details','course_details.college_id','=','college_details.collegeid');
        $courses->join('course_level','course_details.level_id','=','course_level.id');
        $courses->join('universities','universities.u_id','=','college_details.uni_id');
        $courses->join('locations','locations.id','=','college_details.location');
        $courses->select('course_details.*','course_level.title','college_details.slug as college_slug','course_level.slug as course_slug','college_details.images as cimages','college_details.college_name','locations.name','universities.university_name');
        if($keyword){
            $courses->where('course_details.course_name','LIKE','%'.$keyword.'%')->orWhere('college_details.college_name','LIKE','%'.$keyword.'%');
        }    
        if($level){
            $courses->where( 'course_details.level_id', '=', $level );
        }
        if( $location ){

            $courses->where( 'college_details.location', '=', $location );
        }
        if( $course){
            $courses->where('course_details.id', '=', $course);

        }
        if($type){

            $courses->where('college_details.uni_id', '=', $type);
        }
        $result = $courses->paginate(20);
        $slug = '';
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        $metavalues = DB::table('seos')->first();
        $sociallink = Social::first();
        $courselevel = CourseLevel::get();
        $locations = Locations::get();
        $types = University::get();
        $courses = Course::get();
        return view('frontend.course.searchlist',compact('metavalues','slug','menus','home','sociallink','result','locations','types','courses','courselevel'))->withClass('search-list');
    }

    function coursedetail($slug){

    }

    function collegedetail($slug){

    }
}
