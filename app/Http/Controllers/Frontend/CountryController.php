<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use URL;
use App\Models\Page;
use App\Models\Country;
use App\Models\CountryMenu;
use App\Models\CountrySection;
use DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($url)
    {
        //
        $slug = 'country';
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        $metavalues = DB::table('seos')->first();
        $countrysection = CountrySection::where('url',$url)->first();
        $countryid = Country::select('id','header_image','inner_description')->where('slug',$url)->first();
        return view('frontend.country.page',compact('menus','home','slug','metavalues','countryid','url'))->withClass('country-detail');

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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        //
        $slug = 'country';
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        $metavalues = DB::table('seos')->first();
        $countrymenu = CountryMenu::where('url',$url)->first();
        $all = CountryMenu::select('title','url')->where('country_id',$countrymenu->country_id)->get();
        return view('frontend.country.inside',compact('menus','home','slug','metavalues','countrymenu','all','url'))->withClass('country-menu');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_section($url)
    {
        //
        $slug = 'country';
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        $metavalues = DB::table('seos')->first();
        $countrysection = CountrySection::where('url',$url)->first();
        return view('frontend.country.section',compact('menus','home','slug','metavalues','countrysection'))->withClass('country-section');

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
}
