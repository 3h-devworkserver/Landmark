<?php

namespace App\Http\Controllers\Backend;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Models\Posts;
use App\Models\EventImages;
use App\Models\PostCategory;
use File;
use DB;
use Html;
use Input;
use Illuminate\Support\Facades\Redirect;
use Request;


class PostController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $pageheader = 'Post List';
        //$posts = Posts::all();
        $posts = DB::table('posts')
        ->join('post_category','post_category.id', '=', 'posts.category')
        ->select('posts.*','post_category.category as cat')
        ->get();
        return view('backend.post.index', compact('posts','pageheader'));

    }


    public function create(){
    	$pageheader ="Create Post";
        $categories = PostCategory::get();
    	return view('backend.post.create', compact('pageheader','categories'));
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
            return Redirect::to('post/create')
            ->withErrors($validator);
        }
        else
        {
             $input = Input::all();
             if(count($input['cat']) == 1){
             $categories = $input['cat'][0];
             }else{
             $categories = implode(',', $input['cat']);
             }

               if(Input::hasFile('upload'))
                {
                    $file = Input::file('upload');
                    $destinationPath = public_path(). '/img/post';
                    $featured = $file->getClientOriginalName();
                    $file->move($destinationPath, $featured);
                }
                else
                {
                    $featured = '';
                }
               $event = Posts::create([
                        'title' => $input['title'],
                        'url' => $input['url'],
                        'content' => $input['content'],
                        'image' => $featured,
                        'post_order' => $input['post_order'],
                        'category' => $categories,
                ]);
         
            return redirect('admin/post');
        }
    }

    public function edit($id, Request $request)
    {	
    	$pageheader ="Edit Post";
        $posts = Posts::findOrFail($id);
        $categories = PostCategory::get();
       	return view('backend.post.edit', compact('posts', 'pageheader','categories'));
    }

    public function update($id, Request $request)
	{
		      $input = Input::all();
              $imgname = Posts::findOrFail($id);
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
               $event = Posts::where('id',$id)->update([
                        'title' => $input['title'],
                        'url' => $input['url'],
                        'content' => $input['content'],
                        'image' => $featured,
                        'post_order' => $input['post_order'],
                        'category' => $input['category'],
                ]);

             
             
            return redirect('admin/post');
	}

    public function destroy($id){
        $newsEvent = Posts::findOrFail($id);
        $imgName = $newsEvent->image;
        $newsEvent->delete();
        if (!empty($imgName)) {
            if (File::exists('public/img/newsandevents/'.$imgName)) {
                unlink('public/img/newsandevents/'.$imgName);
            }
        }
        return redirect('admin/post');
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


    public function addcategory(){
        $pageheader = 'Post Category';
        $postcat = PostCategory::all();
        return view('backend.post.category', compact('postcat','pageheader'));
    }
    public function storecategory(Request $request){
        $rules = array(
        'title' => 'required',
        );
        $validator = Validator::make(Request::all(), $rules);
        if($validator->fails())
        {
            return Redirect::to('post/add/category')
            ->withErrors($validator);
        }
        else
        {
        $request = Request::all();
        if(empty($request['slug'])){
          $slug = str_replace(' ', '-',strtolower($request['title']));
        }else{
            $slug = $request['slug'];
        }
        PostCategory::create([
                    'category' => $request['title'],
                    'category_slug' => $slug
            ]);
        return redirect('post/add/category');
      }
    }

    public function editcategory($id){
        $pageheader = 'Edit Category';
        $postcat = PostCategory::findOrFail($id);
        return view('backend.post.categoryedit', compact('postcat','pageheader'));
    }

    public function updatecategory($id, Request $request){
        $request = Request::all();
        if(empty($request['slug'])){
          $slug = str_replace(' ', '-',strtolower($request['title']));
        }else{
            $slug = $request['slug'];
        }
        PostCategory::where('id',$id)->update([
                    'category' => $request['title'],
                    'category_slug' => $slug
        ]);

        return redirect('post/add/category');
    }

    public function deletecategory($id){
             $postcat = PostCategory::findOrFail($id);
             $postcat->delete();
             return redirect('post/add/category');
    }

}
