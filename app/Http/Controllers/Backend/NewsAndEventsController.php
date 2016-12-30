<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Models\NewsAndEvents;
use App\Models\EventImages;
use App\Models\Country;
use File;
use DB;
use Html;
use Input;
use Illuminate\Support\Facades\Redirect;
//use Request;


class NewsAndEventsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $newsEvents = NewsAndEvents::all();
        return view('backend.newsandevents.index', compact('newsEvents'));

    }


    public function create(){
    	$pageheader ="Edit News and Event";
        $countries = Country::get();
    	return view('backend.newsandevents.create', compact('pageheader','countries'));
    }

    private function newsAndEventsValidator($data){
    	return Validator::make($data, [
    			'title' => 'required',
    		]);
    }

    public function store(Request $request){

    	$rules = array(
        'title' => 'required',
        //'pageid' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            return Redirect::to('events/create')
            ->withErrors($validator);
        }
        else
        {
             $input = Input::all();
               if(Input::hasFile('upload'))
                {
                    $file = Input::file('upload');
                    $destinationPath = public_path(). '/img/newsandevents';
                    $featured = $file->getClientOriginalName();
                    $file->move($destinationPath, $featured);
                }
                else
                {
                    $featured = '';
                }
                if(Input::hasFile('headerimg'))
                {
                    $file1 = Input::file('headerimg');
                    $destinationPath = public_path(). '/img/newsandevents';
                    $headerimg = $file1->getClientOriginalName();
                    $file1->move($destinationPath, $headerimg);
                }
                else
                {
                    $headerimg = '';
                }
                if(count($input['cat']) == 1){
                     $categories = $input['cat'][0];
                }else{
                     $categories = implode(',', $input['cat']);
                }
               $event = NewsAndEvents::create([
                        'title' => $input['title'],
                        'c_id' => $input['country'],
                        'e_date' =>  date("Y-m-d", strtotime( $input['date'] ) ) ,
                        'summary' => $input['summary'],
                        'content' => $input['content'],
                        'image' => $featured,
                        'news_order' => $input['news_order'],
                        'category' => $categories,
                        'slug' => str_replace(' ', '-', strtolower($input['title'])),
                        'sidebar_content' => $input['sidebar_content'],
                        'header_img' => $headerimg,
                ]);
               $eid = $event->id; 
               if($eid){
                 if(Input::hasFile('uploadimg'))
                {
                    $file = Input::file('uploadimg');
                    $destinationPath = public_path(). '/img/newsandevents';
                    foreach ($file as $key => $value) {
                        # code...
                        $filename = $value->getClientOriginalName();
                        $value->move($destinationPath, $filename);
                        EventImages::create([
                                'event_id' => $eid,
                                'images' => $filename
                            ]);
                    }
                    
                }
               }
            return redirect('admin/events');
        }
    }

    public function edit($id, Request $request)
    {	
    	$pageheader ="Edit News and Event";
        $newsEvent = NewsAndEvents::findOrFail($id);
        $countries = Country::get();
    	$eventimg = EventImages::where('event_id',$id)->get();
       	return view('backend.newsandevents.edit', compact('newsEvent', 'pageheader','eventimg','countries'));
    }

    public function update($id, Request $request)
	{
		      $input = Input::all();
              $imgname = NewsAndEvents::findOrFail($id);
               if(Input::hasFile('upload'))
                {
                    $file = Input::file('upload');
                    $destinationPath = public_path(). '/img/newsandevents';
                    $featured = $file->getClientOriginalName();
                    $file->move($destinationPath, $featured);
                }
                else
                {
                    if(!empty($imgname->image)){
                        $featured = $imgname->image;
                    }
                }
                 if(Input::hasFile('file'))
                {
                    $file1 = Input::file('file');
                    $destinationPath = public_path(). '/img/newsandevents';
                    $headerimg = $file1->getClientOriginalName();
                    $file1->move($destinationPath, $headerimg);
                }
                else
                {
                    if(!empty($imgname->header_img)){
                        $headerimg = $imgname->header_img;
                    }else{
                        $headerimg = '';
                    }
                }
                if(count($input['cat']) == 1){
                     $categories = $input['cat'][0];
                }else{
                     $categories = implode(',', $input['cat']);
                }
               $event = NewsAndEvents::where('id',$id)->update([
                        'title' => $input['title'],
                        'c_id' => $input['country'],
                        'e_date' =>  date("Y-m-d", strtotime( $input['date'] ) ) ,
                        'summary' => $input['summary'],
                        'content' => $input['content'],
                        'image' => $featured,
                        'news_order' => $input['news_order'],
                        'category' => $categories,
                        'slug' => str_replace(' ', '-', strtolower($input['title'])),
                        'sidebar_content' => $input['sidebar_content'],
                        'header_img' => $headerimg,
                ]);

                    if(Input::hasFile('uploadimg'))
                        {
                            $file = Input::file('uploadimg');
                            $destinationPath = public_path(). '/img/newsandevents';
                            foreach($file as $key=>$img){
                                $filename = $img->getClientOriginalName();
                                $img->move($destinationPath, $filename);
                                    EventImages::where([
                                        ['id','=',$input['eimg'][$key]],
                                        ['event_id','=',$id],
                                        ])->update([
                                        'images' => $filename
                                    ]);                                
                           
                        }
               }
             
            return redirect('admin/events');
	}

    public function destroy($id){
        $newsEvent = NewsAndEvents::findOrFail($id);
        $imgName = $newsEvent->image;
        $newsEvent->delete();
        if (!empty($imgName)) {
            if (File::exists('public/img/newsandevents/'.$imgName)) {
                unlink('public/img/newsandevents/'.$imgName);
            }
        }
        return redirect('admin/events');
    }

   public function imgdelete(){
     print_r($_POST);
        $id = $_POST['pid'];
        $eid = $_POST['eid'];
        
       $imgName = EventImages::where([            
            ['id','=',$id],
            ['event_id','=',$eid]

        ])->first();
         EventImages::where([            
            ['id','=',$id],
            ['event_id','=',$eid]

        ])->delete();
        if (!empty($imgName->images)) {
            if (File::exists('public/img/newsandevents/'.$imgName->images)) {
                unlink('public/img/newsandevents/'.$imgName->images);
            }
        }
        return response()->json(array('success' => true, 'stat' => 'ok'));
    }


}
