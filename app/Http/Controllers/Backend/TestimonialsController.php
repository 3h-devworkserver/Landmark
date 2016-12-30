<?php

namespace App\Http\Controllers\Backend;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use File;
use DB;
use Html;
use Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;

class TestimonialsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$testimonials = Testimonials::orderBy('testimonial_order','ASC')->simplePaginate(10);;
    	return view('backend.testimonials.index', compact('testimonials'));

    }

    public function create(){
    	$pageheader = 'Create Testimonials';
    	return view('backend.testimonials.create', compact('pageheader'));
    }

  

    public function store(Request $request){
    	 $rules = array(
        'name' => 'required',
        //'pageid' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            return Redirect::to('testimonials/create')
            ->withErrors($validator);
        }
        else
        {
             $input = Input::all();
               

                if(Input::hasFile('upload'))
                {
                    $file = Input::file('upload');
                    $destinationPath = public_path(). '/img/testimonial';
                    $filename = $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                }
                else
                {
                    $filename = '';
                }
                 Testimonials::create([
                        'name' => $input['name'],
                        'job_title' => $input['job_title'],
                        'company' => $input['company'],
                        'address' => $input['address'],
                        'content' => $input['content'],
                        'testimonial_order' => $input['testimonial_order'],
                        'image' => $filename,
                        'url' => $input['url'],
                        ]);

    	return redirect('admin/testimonials');
        }
	}

	public function edit($id)
	{	
		$pageheader = 'Edit Testimonials';
		$testimonial = Testimonials::findOrFail($id);
		return view('backend.testimonials.edit', compact('testimonial', 'pageheader'));
	}

	public function update($id, Request $request)
	{
		$rules = array(
        'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            return Redirect::to('testimonials/create')
            ->withErrors($validator);
        }
        else
        {
             $input = Input::all();
              
                if(Input::hasFile('upload'))
                {
                    $file = Input::file('upload');
                    $destinationPath = public_path(). '/img/testimonial/';
                    $filename = $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                }
                else
                {
                    $filename = '';
                }
                 DB::table('testimonials')
                    ->where('id', $id)
                    ->update([
                        'name' => $input['name'],
                        'job_title' => $input['job_title'],
                        'company' => $input['company'],
                        'address' => $input['address'],
                        'content' => $input['content'],
                        'testimonial_order' => $input['testimonial_order'],
                        'image' => $filename,
                        'url' => $input['url'],
                        ]);
            return Redirect::to('admin/testimonials');

        }
       
	}

	public function destroy($id){
		$testimonial = Testimonials::findOrFail($id);
		$imgName = $testimonial->image;
		$testimonial->delete();
		if (!empty($imgName)) {
			if (File::exists('public/img/testimonial/'.$imgName)) {
				unlink('public/img/testimonial/'.$imgName);
			}
		}
		return redirect('admin/testimonials');
	}
	

}
