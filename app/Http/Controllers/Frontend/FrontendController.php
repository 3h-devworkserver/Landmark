<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use URL;
use App\Models\Page;
use App\Models\NewsAndEvents;
use App\Models\EventImages;
use App\Models\EmailTemplate;
use Mail;
use DB;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        

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

    public function submit(Request $request)
    {
        parse_str($_POST['source'], $user);
        $content = EmailTemplate::all();
        
        Mail::send('frontend.emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('lakshya@3hammers.com', 'Test');

            $m->to($user['email'], $user['fullname'])->subject('Test');
        });
    }

    public function newsdetail($value)
    {
        
        $slug = '';
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        $news = NewsAndEvents::where('slug',$value)->first();
        $eimage = DB::table('event_images')->where('event_id', $news->id)->get();
        $metavalues = DB::table('seos')->first();

        return view('frontend.pages.newseventsdetail',compact('metavalues','news','eimage','menus','home','slug'))->withClass('news-events-details');

    } 

    public function newsform()
    {
        
        $slug = '';
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        //$news = NewsAndEvents::where('slug',$value)->first();
        //$eimage = DB::table('event_images')->where('event_id', $news->id)->get();
        $metavalues = DB::table('seos')->first();

        return view('frontend.emails.form',compact('metavalues','menus','home','slug'))->withClass('news-events-details');

    }

     public function newssubmit(Request $request)
    {
        parse_str($_POST['source'], $user);
      
        Mail::send('frontend.emails.news', ['user' => $user], function ($m) use ($user) {
            $m->from('lakshya@3hammers.com', 'Test');

            $m->to($user['email'], $user['fullname'])->subject('Test');
        });
    }
}
