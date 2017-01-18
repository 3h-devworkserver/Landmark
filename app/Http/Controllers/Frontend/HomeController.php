<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use URL;
use App\Models\StaticBlock;
use App\Models\BlockStatic;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\PostCategory;
use App\Social;
use DB;
use App\Models\Page;
use App\Models\NewsAndEvents;
use App\Models\Testimonials;

class HomeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slug = '';
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        $metavalues = DB::table('seos')->first();
        $sliders = DB::table('pages')
            ->join('sliders', 'pages.slider', '=', 'sliders.sliderid')
            ->select('pages.slider', 'sliders.*')
            ->get();
        //$pagetop = StaticBlock::where('page_id', 1)->whereOr('position','top')->get();
        $pagetop = BlockStatic::where('page_id', 1)->whereOr('position','top')->get();
        $sociallink = Social::first();
        $contacts = Contact::get();
        return view('frontend.home.index',compact('metavalues','slug','menus','home','pagetop','sociallink','sliders','contacts'))->withClass('home');
    }

      public function page($slug)
    {
        //
        $page = Page::where('slug', $slug)->first();
        $menus = DB::table('menus')->where('parent_id','0')->get();
        $home = DB::table('generals')->first();
        $pages = Page::select('id','type','slug')->get();
        $metavalues = DB::table('seos')->first();
        if(!empty($page)){
        foreach($pages as $p){
            if($p->type == 'news' && strpos($slug,$p->type) !== false){
                $image = Page::select('featured_image')->where('id',$p->id)->first();
                $news = NewsAndEvents::orderBy('e_date','DESC')->get();
                return view('frontend.home.newsevents',compact('metavalues','news','image','home','menus','slug'))->withClass('news-events',$slug);
            }else
            if($p->type == 'testimonial' && strpos($slug,$p->type) !== false){
                $testpage = Page::where('slug',$slug)->first();
                $testimonials = Testimonials::orderBy('testimonial_order')->get();
                return view('frontend.home.testimonials',compact('metavalues','testimonials','testpage','home','menus','slug'))->withClass('testimonials',$slug);

            }else
            if($p->type == 'posts' && strpos($slug,$p->slug) !== false){               
                $pageslug = $p->slug; 
                $compare = str_replace('-','', $slug);
                $categories = PostCategory::where('category_slug',$slug)->first();
                $posts = Posts::where('category',$categories['id'])->orderBy('post_order','ASC')->get();
             return view('frontend.home.posts',compact('metavalues','posts','slug','home','menus','pageslug'))->withClass('posts '. $slug);
            }else

            if($p->type == 'pages' && strpos($slug,$p->slug) !== false){
                $pagedetails = Page::where('slug',$slug)->get();
                $sociallink = Social::first();
                return view('frontend.home.page',compact('metavalues','home','menus','pagedetails','sociallink','slug'))->withClass($slug);
            }
        }
    }else{
        return view('frontend.error.404');
        }

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
}
