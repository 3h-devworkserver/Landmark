<?php
namespace App\Http\Controllers\Backend;
//use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Html;
use Input;
use App\Models\Page;
use App\Models\Slider;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;
class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
//
public function index(){
          $pageheader = "List Slider";

$sliders = DB::table('sliders')->select('*')->groupBy('sliderid')->get();
    return view('backend.slider.index',compact('sliders','pageheader'));
}
public function create()
{
//
          $pageheader = "Create Slider";

$pages = DB::table('pages')->select('id','title')->get();
$last = Slider::orderBy('id', 'desc')->first();
if(empty($last)){
$lastv = '1';
}else{
$lastv = $last['sliderid'] + 1 ;
}
return view('backend.slider.create',compact('pages','lastv','pageheader'));
}
public function store(){
$rules = array(
'title' => 'required',
'pageid' => 'required',
'sliderimg' => 'required',
);
$validator = Validator::make(Input::all(), $rules);
if($validator->fails())
{
return Redirect::to('slides/create')
->withErrors($validator);
}
else
{
    $inputs = Input::all();

foreach( $inputs['counter'] as $key=>$input ){
$sliderid = $inputs['sliderid'];
$pageid = $inputs['pageid'];
$title = $inputs['title'];
$caption = $inputs['caption'][$key];
$link = $inputs['link'][$key];
$vurl = $inputs['vurl'][$key];
if(Input::hasFile('sliderimg'))
{
$file = Input::file('sliderimg');
$destinationPath = public_path(). '/img/slider/';
$bfilename = $file[$key]->getClientOriginalName();
$file[$key]->move($destinationPath, $bfilename);

}else{
$bfilename = '';
}
if(Input::hasFile('iconimg'))
{
$icon = Input::file('iconimg');
$destinationPath = public_path(). '/img/slider/icon/';
$iconfile = $icon[$key]->getClientOriginalName();
$icon[$key]->move($destinationPath, $iconfile);

}else{
$iconfile = '';
}
Slider::create([
'sliderid' => $sliderid,
'pageid' => $pageid,
'title' => $title,
'caption' => $caption,
'link' => $link,
'image' => $bfilename,
'iconimage' => $iconfile,
'videolink' => $vurl,
]);
}
return Redirect::to('slider');
}
}
public function edit($id){
          $pageheader = "Edit Slider";

$sliders = DB::table('sliders')
->join('pages','sliders.pageid','=','pages.id')
->select('sliders.*','pages.title as pt')
->where('sliders.sliderid',$id)
->get();
$mainpages = DB::table('pages')->select('id','title')->get();
return view('backend.slider.edit',compact('sliders','mainpages','id','pageheader'));
}
public function update(Request $request, $id){
$inputs = Input::all();
                    foreach( $inputs['counter'] as $key=>$input ){
                    $sid = $inputs['id'][$key];
                    $sliderid = $inputs['sliderid'];
                    $pageid = $inputs['pageid'];
                    $title = $inputs['title'];
                    $caption = $inputs['caption'][$key];
                    $link = $inputs['link'][$key];
                    $vurl = $inputs['vurl'][$key];
                    if(Input::hasFile('sliderimg'))
                    {
                        $file = Input::file('sliderimg');
                        $destinationPath = public_path(). '/img/slider/';
                        if(!empty($file[$key])){
                            $bfilename = $file[$key]->getClientOriginalName();
                            $file[$key]->move($destinationPath, $bfilename);
                        }
                       
                    }
                    if(Input::hasFile('iconimg'))
                    {
                        $icon = Input::file('iconimg');
                        $destinationPath = public_path(). '/img/slider/icon/';
                        if(!empty($icon[$key])){
                            $iconfile = $icon[$key]->getClientOriginalName();
                            $icon[$key]->move($destinationPath, $iconfile);
                        }
                       
                    }
                    if(!empty($file[$key]) && !empty($icon[$key]) ){
                       
                         DB::table('sliders')
                        ->where([
                            ['id','=',$sid],
                            ['sliderid','=',$id]
                            ])
                        ->update([
                            'sliderid' => $sliderid,
                            'pageid' => $pageid,
                            'title' => $title,
                            'caption' => $caption,
                            'link' => $link,
                            'image' => $bfilename,
                            'iconimage' => $iconfile,
                            'videolink' => $vurl,
                            ]);
                    }elseif(!empty($icon[$key])){
                                          
                         DB::table('sliders')
                        ->where([
                            ['id','=',$sid],
                            ['sliderid','=',$id]
                            ])
                        ->update([
                            'sliderid' => $sliderid,
                            'pageid' => $pageid,
                            'title' => $title,
                            'caption' => $caption,
                            'link' => $link,
                            'iconimage' => $iconfile,
                            'videolink' => $vurl,
                            ]);
                    }elseif(!empty($file[$key])){
                        
                         DB::table('sliders')
                        ->where([
                            ['id','=',$sid],
                            ['sliderid','=',$id]
                            ])
                        ->update([
                            'sliderid' => $sliderid,
                            'pageid' => $pageid,
                            'title' => $title,
                            'caption' => $caption,
                            'link' => $link,
                            'image' => $bfilename,
                            'videolink' => $vurl,
                            ]);
                    }else{
                                          
                         DB::table('sliders')
                        ->where([
                            ['id','=',$sid],
                            ['sliderid','=',$id]
                            ])
                        ->update([
                            'sliderid' => $sliderid,
                            'pageid' => $pageid,
                            'title' => $title,
                            'caption' => $caption,
                            'link' => $link,
                            'videolink' => $vurl,
                            ]);
                    }
                   
                }
                return Redirect::to('slider');
        }
        public function destroy($id){
            //
        DB::table('sliders')->where('sliderid', '=', $id)->delete();
        return Redirect::to('slider');
        }
    }