<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\General;
use App\Seo;
use App\Social;
use DB;

class ThemeOptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //

    public function index()
    {
        //
        //$generals = DB::table('generals')->select('*')->first();
        return view('layouts.settings.themeoption');
    }


    public function themesetting(){
    	//

        $input = Input::all();
        if(Input::hasFile('image')){
        $file = Input::file('image');
        $destinationPath = public_path(). '/img/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        }else{
            $filename = '';
        }
        $generals = DB::table('generals')->get();
        if(count($generals) == 0 ){
          General::create([
            'site_name' => $input['sitename'],
            'tagline' => $input['description'],
            'admin_email' => $input['admin_email'],
            'logo' => $filename
        ]);
    }else{
        DB::table('generals')->where('id', 1)->update(
            array('site_name' => $input['sitename'],
            'tagline' => $input['description'],
            'admin_email' => $input['admin_email'],
            'logo' => $filename
            ));
    }
        return \Redirect::route('setting.general')->with('message','Setting saved successfully!');
    }
}
