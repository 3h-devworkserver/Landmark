<?php

namespace App\Http\Controllers\Backend;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use DB;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use File;

class EmailController extends Controller
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
        $text = EmailTemplate::select('id','content')->where('identify','0')->get();
        return view('backend.email.index',compact('text'));
    }

     public function newsindex()
    {
        //
        $text = EmailTemplate::select('id','content')->where('identify','1')->first();
        return view('backend.email.news',compact('text'));
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
        $request = Request::all();
        EmailTemplate::create([
            'content' => $request['emailsetting'],
            'identify' => $request['identify']
            ]);
        if($request['identify'] == 0){
        file_put_contents(base_path() . '/resources/views/frontend/emails/reminder.blade.php', $request['emailsetting']);
        return redirect('setting/email/notify');
        }else{
        file_put_contents(base_path() . '/resources/views/frontend/emails/news.blade.php', $request['emailsetting']);
        return redirect('setting/news-events/notify');
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
        EmailTemplate::where([
            ['id','=',$id],
            ['identify','=',$request['identify']]
            ])->update([
            'content' => $request['emailsetting'],
            'identify' => $request['identify']
            ]);
        if($request['identify'] == 0){
        file_put_contents(base_path() . '/resources/views/frontend/emails/reminder.blade.php', $request['emailsetting']);
        return redirect('setting/email/notify');
        }else{
        file_put_contents(base_path() . '/resources/views/frontend/emails/news.blade.php', $request['emailsetting']);
        return redirect('setting/news-events/notify');
        }
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
