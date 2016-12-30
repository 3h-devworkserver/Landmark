<?php

namespace App\Http\Controllers\Backend;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Html;
use Input;
use App\Models\Page;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
    {
        //
        $pageheader = "List Page";
        $pages = DB::table('pages')->simplePaginate(10);
        $all = DB::table('pages')->count();
        $publish = DB::table('pages')->where('status','publish')->count();
        $draft = DB::table('pages')->where('status','draft')->orWhere('status',' ')->count();

        return view('backend.page.index',compact('pages','all','publish','draft','pageheader'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageheader = "Create Page";
        $slider = DB::table('sliders')->select('sliderid','title')->groupBy('title')->get();
        return view('backend.page.create',compact('pageheader','slider'));
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
            return Redirect::to('page/new')
            ->withErrors($validator);
        }
        else
        {
             $input = Input::all();

                if(Input::hasFile('file'))
                {
                    $file = Input::file('file');
                    $destinationPath = public_path(). '/img/';
                    $filename = $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                }
                else
                {
                    $filename = '';
                }
                if(empty($input['type'])){
                    $type = 'pages';
                }else{
                    $type = $input['type'];
                }
                 Page::create([
                        'title' => $input['title'],
                        'description' => $input['description'],
                        'slider' => $input['slider'],
                        'featured_image' => $filename,
                        'meta_title' => $input['meta_title'],
                        'meta_keyword' => $input['meta_key'],
                        'meta_description' => $input['meta_desc'],
                        'status' => $input['status'],
                        'slug' => str_replace(' ', '-', strtolower($input['title'])),
                        'type' => $type
                        ]);
            return Redirect::to('page/list');

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
        $pageheader = "Edit Page";
        $pages = DB::table('pages')->select('*')->where('id',$id)->first();
        $slider = DB::table('sliders')->select('sliderid','title')->groupBy('title')->get();

        return view('backend.page.edit',compact('pages','pageheader','slider'));
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
        $request = Request::all(); 
        $filenames = DB::table('pages')->select('featured_image')->where('id',$id)->first();
        if(Request::hasFile('file'))
                {
                    $file = Request::file('file');
                    $destinationPath = public_path(). '/img/';
                    $filename = $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                }
                else
                {
                    $filename = $filenames->featured_image;
                }
                if(empty($request['type'])){
                    $type = 'pages';
                }else{
                    $type = $request['type'];
                }
                DB::table('pages')
                    ->where('id', $id)
                    ->update([
                        'title' => $request['title'],
                        'description' => $request['description'],
                        'slider' => $request['slider'],
                        'featured_image' => $filename,
                        'meta_title' => $request['meta_title'],
                        'meta_keyword' => $request['meta_key'],
                        'meta_description' => $request['meta_desc'],
                        'status' => $request['status'],
                        'type' => $type

                        ]);
        return Redirect::to('page/list');
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
        DB::table('static_pages')->where('page_id',$id)->delete();
        DB::table('pages')->where('id', '=', $id)->delete();
        return Redirect::to('page/list');
    }

    public function sorting($id)
    {
      $pageheader = "List Page";
        if($id == 'all'){
         $pages = DB::table('pages')->simplePaginate(10);
        }else if($id == 'publish'){
         $pages = DB::table('pages')->where('status',$id)->simplePaginate(10);
        }else{
         $pages = DB::table('pages')->where('status',$id)->orWhere('status','')->simplePaginate(10);   
        }
      
        $all = DB::table('pages')->count();
        $publish = DB::table('pages')->where('status','publish')->count();
        $draft = DB::table('pages')->where('status','draft')->orWhere('status',' ')->count();

        return view('backend.page.sorting',compact('pages','all','publish','draft','id','pageheader'));
        
    }


    public function destroyfimg()
    {
        # code...
        DB::table($_POST['table'])->where('id', '=', $_POST['pid'])->update([
            'featured_image' => '',
            ]);
       return response()->json(array('success' => true, 'stat' => 'ok'));
    }
}
