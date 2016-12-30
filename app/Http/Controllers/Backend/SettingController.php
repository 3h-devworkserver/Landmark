<?php

namespace App\Http\Controllers\Backend;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\General;
use App\Seo;
use App\Social;
use DB;
use Request;

class SettingController extends Controller
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
        $pageheader = "General Setting";

        $generals = DB::table('generals')->select('*')->first();
        return view('layouts.settings.general',compact('generals','pageheader'));
    }

    public function seo()
    {
        //
        $pageheader = "SEO Setting";
        $seo = DB::table('seos')->select('*')->first();
        
        return view('layouts.settings.seo',compact('seo','pageheader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $generals = DB::table('generals')->get();
        if(Input::hasFile('image')){
        $file = Input::file('image');
        $destinationPath = public_path(). '/img/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, str_replace(' ','-',$filename));
        }else{
            if($generals[0]->logo != ''){

            $filename = $generals[0]->logo;
            }else{
                
            $filename = '';
            }
        }
        
        if(Input::hasFile('favicon')){
        $favicon = Input::file('favicon');
        $destinationPath = public_path(). '/img/';
        $faviconname = $favicon->getClientOriginalName();
        $favicon->move($destinationPath, $faviconname);
        }else{
            if($generals[0]->favicon != ''){

            $faviconname = $generals[0]->favicon;
            }else{
                
            $faviconname = '';
            }
        }

        if(count($generals) == 0 ){
          General::create([
            'site_name' => $input['sitename'],
            'tagline' => $input['description'],
            'admin_email' => $input['admin_email'],
            'logo' => str_replace(' ','-',$filename),
            'favicon' => $faviconname,
            'map_address' => $input['mapaddress'],
            'map_lat' => $input['map_lat'],
            'map_lon' => $input['map_lon'],
        ]);
    }else{
        DB::table('generals')->where('id', 1)->update(
            array('site_name' => $input['sitename'],
            'tagline' => $input['description'],
            'admin_email' => $input['admin_email'],
            'logo' => str_replace(' ','-',$filename),
            'favicon' => $faviconname,
            'map_address' => $input['mapaddress'],
            'map_lat' => $input['map_lat'],
            'map_lon' => $input['map_lon'],
            ));
    }
        return \Redirect::route('setting.general')->with('message','Setting saved successfully!');
    }

    public function storeseo(Request $request)
    {
        //

        $input = Input::all();

        if(isset($input['meta-robot'])){
            $meta = $input['meta-robot'];
        }else{
            $meta = 'no';
        }
        $metas = DB::table('seos')->get();
        if(count($metas) == 0 )
        {
              Seo::create([
                'meta_title' => $input['metatitle'],
                'meta_keyword' => $input['metakeyword'],
                'meta_desc' => addslashes($input['meta-description']),
                'google_analytics' => $input['google-analytics'],
                'meta_robot' => $meta
            ]);
        }
         else
        {
            DB::table('seos')->where('id', 1)->update(
                array('meta_title' => $input['metatitle'],
                'meta_keyword' => $input['metakeyword'],
                'meta_desc' => addslashes($input['meta-description']),
                'google_analytics' => $input['google-analytics'],
                'meta_robot' => $meta
                ));
        }
        return \Redirect::route('setting.seo')->with('message','Setting saved successfully!');
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
    }

     /**
     * Show the form for editing the settings.
     *
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function getSettings()
    {
              $pageheader = "Social Setting";

            $social = DB::table('socials')->select('*')->first();

              return view('layouts.settings.sociallinks',compact('social','pageheader'));
    }
    public function socialstore(Request $request)
    {
        //

        $input = Input::all();
      
        $socials = DB::table('socials')->get();
        if(count($socials) == 0 )
        {
              Social::create([
                'facebook' => $input['facebook'],
                'twitter' => $input['twitter'],
                'google_plus' => $input['google-plus'],
                'youtube' => $input['youtube'],
                'tumblr' => $input['tumblr'],
                'pinterest' => $input['pinterest'],
                'linkedin' => $input['linkedin'],
                'vimeo' => $input['vimeo']
            ]);
        }
         else
        {
            DB::table('socials')->where('id', 1)->update(
                array(
                    'facebook' => $input['facebook'],
                'twitter' => $input['twitter'],
                'google_plus' => $input['google-plus'],
                'youtube' => $input['youtube'],
                'tumblr' => $input['tumblr'],
                'pinterest' => $input['pinterest'],
                'linkedin' => $input['linkedin'],
                'vimeo' => $input['vimeo']
                ));
        }
        return \Redirect::route('setting.social')->with('message','Setting saved successfully!');
    }
    

}
