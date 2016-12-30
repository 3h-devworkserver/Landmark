<?php

namespace App\Http\Controllers\Backend;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Html;
use Input;
use App\Models\StaticBlock;
use App\Models\BlockStatic;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;


class StaticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $pageheader = "List Static Page";

        $pages = DB::table('static_blocks')
        ->join('pages','static_blocks.page_id','=','pages.id')
        ->select('static_blocks.*','pages.title')
        ->get();

        return view('backend.staticblock.index',compact('pages','pageheader'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageheader = "Create Static Page";

        $pages = DB::table('pages')->select('id','title')->get();
        $last = StaticBlock::orderBy('ordering', 'desc')->first();
        return view('backend.staticblock.create',compact('pages','pageheader','last'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeold(Request $request)
    {
        //
        $rules = array(
        'title' => 'required',
        'pageid' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            return Redirect::to('static/block/new')
            ->withErrors($validator);
        }
        else
        {
             $input = Input::all();
                if(Input::hasFile('bfile'))
                {
                    $file = Input::file('bfile');
                    $destinationPath = public_path(). '/img/';
                    $bfilename = $file->getClientOriginalName();
                    $file->move($destinationPath, $bfilename);
                }
                else
                {
                    $bfilename = '';
                }

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
                 StaticBlock::create([
                        'page_id' => $input['pageid'],
                        'position' => $input['position'],
                        'url' => $input['url'],
                        'static_title' => $input['title'],
                        'sub_title' => $input['subtitle'],
                        'short_description' => $input['shortdescription'],
                        'description' => $input['description'],
                        'featured_image' => $filename,
                        'parallax' => $input['parallax'],
                        'boption' => $input['backgroundoption'],
                        'background_color' => $input['bcolor'],
                        'background_image' => $bfilename,
                        'ordering' => $input['order'],
                        ]);
            return Redirect::to('static/block/list');

        }
       
    }

public function store(Request $request)
    {
        //

        $rules = array(
        'title' => 'required',
        'pageid' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails())
        {
            return Redirect::to('static/block/new')
            ->withErrors($validator);
        }
        else
        {
            $inputs = Input::all();
            foreach( $inputs['counter'] as $key=>$input ){
                    $pageid = $inputs['pageid'];
                    $title = $inputs['title'][$key];
                    $identifier = $inputs['identifier'][$key];
                    $subtitle = $inputs['subtitle'][$key];
                    $url = $inputs['url'][$key];
                    $content = htmlspecialchars_decode($inputs['description'][$key]);
                    $position = $inputs['position'][$key];
                    $parallax = $inputs['parallax'][$key];
                    $boption = $inputs['backgroundoption'][$key];
                    $bcolor = $inputs['bcolor'][$key];
                    $order = $inputs['order'][$key];
                    
                     if(Input::hasFile('bfile'))
                        {
                            $bfile = Input::file('bfile');
                            $destinationPath = public_path(). '/img/';
                            if(!empty($bfile[$key])){
                                $bfilename = $bfile[$key]->getClientOriginalName();
                                $bfile[$key]->move($destinationPath, $bfilename);
                            }else{
                                $bfilename = '';
                            }
                        }
                        else
                        {
                            $bfilename = '';
                        }

                        if(Input::hasFile('file'))
                        {
                            $file = Input::file('file');
                            $destinationPath = public_path(). '/img/';
                            if(!empty($file[$key])){
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
                    BlockStatic::create([
                                'page_id' => $pageid,
                                'identifier' => str_replace(' ', '-', strtolower($identifier)),
                                'position' => $position,
                                'url' => $url,
                                'static_title' => $title,
                                'sub_title' => $subtitle,
                                'description' => $content,
                                'featured_image' => $filename,
                                'parallax' => $parallax,
                                'boption' => $boption,
                                'background_color' => $bcolor,
                                'background_image' => $bfilename,
                                'ordering' => $order,
                                ]);
            }
             
            return Redirect::to('static/block/list');

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
              $pageheader = "Edit Static Page";

        //$pages = DB::table('static_pages')->select('*')->where('id',$id)->first();
        $pages = DB::table('static_blocks')
        ->join('pages','static_blocks.page_id','=','pages.id')
        ->select('static_blocks.*','pages.title')
        ->where('static_blocks.id',$id)
        ->first();
        
        $mainpages = DB::table('pages')->select('id','title')->get();

        return view('backend.staticblock.edit',compact('pages','mainpages','pageheader'));
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
        $filenames = DB::table('static_blocks')->select('featured_image','background_image')->where('id',$id)->first();
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
                if(Request::hasFile('bfile'))
                {
                    $file = Request::file('bfile');
                    $destinationPath = public_path(). '/img/';
                    $bfilename = $file->getClientOriginalName();
                    $file->move($destinationPath, $bfilename);
                }
                else
                {
                    $bfilename = $filenames->background_image;
                }
                DB::table('static_blocks')
                    ->where('id', $id)
                    ->update([
                        'page_id' => $request['pageid'],
                        'position' => $request['position'],
                        'url' => $request['url'],
                        'static_title' => $request['title'],
                        'sub_title' => $request['subtitle'],
                        'description' => $request['description'],
                        'featured_image' => $filename,
                        'parallax' => $request['parallax'],
                        'boption' => $request['backgroundoption'],
                        'background_color' => $request['bcolor'],
                        'background_image' => $bfilename,
                        ]);
        return Redirect::to('static/block/list');
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
        DB::table('static_blocks')->where('id', '=', $id)->delete();
        return Redirect::to('static/block/list');
    }}
