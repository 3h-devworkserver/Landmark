<?php
namespace App\Http\Controllers\Backend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CountryMenu;
use App\Models\CountrySection;
use App\Models\CountryAccordion;
use App\Models\CountryBlock;
use File;
use DB;
use Html;
use Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Request;
class CountryController extends Controller
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
$pageheader = 'List of Country';
$countries = Country::get();
return view('backend.country.add.list',compact('countries','pageheader'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
//
$pageheader = 'Create Country';
return view('backend.country.add.create',compact('pageheader'));
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
//'pageid' => 'required',
);
$validator = Validator::make(Input::all(), $rules);
if($validator->fails())
{
return Redirect::to('admin/country/create')
->withErrors($validator);
}
else
{
$inputs = Input::all();
                   foreach( $inputs['counter'] as $key=>$input )
                   {
                        $title = $inputs['title'][$key];
                        $description = $inputs['content'][$key];
                        $innerdescription = $inputs['innercontent'][$key];
                        $url = $inputs['url'][$key];
                        if(Input::hasFile('upload'))
                        {
                            $file = Input::file('upload');
                            $destinationPath = public_path(). '/img/country/';
                            if( !empty( $file[$key] ) ){
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
                        if(Input::hasFile('uploadheader'))
                        {
                            $hfile = Input::file('uploadheader');
                            $destinationPath = public_path(). '/img/country/';
                            if( !empty( $hfile[$key] ) ){
                             $hfilename = $hfile[$key]->getClientOriginalName();
                             $hfile[$key]->move($destinationPath, $hfilename);
                            }else{
                                $hfilename = '';
                            }
                        }
                        else
                        {
                            $hfilename = '';
                        }
                        Country::create([
                                'title' => $title,
                                'description' => $description,
                                'inner_description' => $innerdescription,
                                'featured_image' => $filename,
                                'header_image' => $hfilename,
                                'url' => $url,
                                'slug' => trim( strtolower( $title ) ),
                                ]);
                    }
                    return redirect('admin/country');
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
            $pageheader = 'Edit Country';
            $countries = Country::findOrFail($id);
            return view('backend.country.add.edit',compact('pageheader','countries'));
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
            $rules = array(
            'title' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/country/edit'.$id)
                ->withErrors($validator);
            }
            else
            {
                $inputs = Input::all();
                $filenames = DB::table('country')->select('featured_image','header_image')->where('id',$id)->first();
                    if(Input::hasFile('upload'))
                    {
                        $file = Input::file('upload');
                        $destinationPath = public_path(). '/img/country/';
                        $filename = $file->getClientOriginalName();
                        $file->move($destinationPath, $filename);
                    }
                    else
                    {
                        $filename = $filenames->featured_image;
                    }
                    if(Input::hasFile('uploadheader'))
                    {
                        $hfile = Input::file('uploadheader');
                        $destinationPath = public_path(). '/img/country/';
                        $hfilename = $hfile->getClientOriginalName();
                        $hfile->move($destinationPath, $hfilename);
                    }
                    else
                    {
                        $hfilename = $filenames->header_image;
                    }
                    $title = $inputs['title'];
                    $description = $inputs['content'];
                    $innerdescription = $inputs['innercontent'];
                    $url = $inputs['url'];
                     DB::table('country')
                        ->where('id', $id)
                        ->update([
                                'title' => $title,
                                'description' => $description,
                                'inner_description' => $innerdescription,
                                'featured_image' => $filename,
                                'header_image' => $hfilename,
                                'url' => $url,
                                'slug' => trim( strtolower( $title ) ),
                            ]);
                return Redirect::to('admin/country');
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
            DB::table('country')->where('id', '=', $id)->delete();
            return Redirect::to('admin/country');
        }

        /**
         * Show the form for creating a Country menu.
         *
         * @return \Illuminate\Http\Response
         */

        public function country_menu(){
            $pageheader = 'List Country Menu';
            $countries = CountryMenu::get();
            return view('backend.country.menu.list',compact('pageheader','countries'));
        }
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function countrymenu_create()
        {
            //
            $pageheader = 'Create Country Menu';
            $countries = Country::get();
            return view('backend.country.menu.create',compact('pageheader','countries'));
        }
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function countrymenu_store(Request $request)
        {
            //
            $rules = array(
            'title' => 'required',
            'country' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/country/menu/create')
                ->withErrors($validator);
            }
            else
            {
                 $inputs = Input::all();
                 $cid = $inputs['country'];
                   foreach( $inputs['counter'] as $key=>$input )
                   {
                        $title = $inputs['title'][$key];
                        $content = $inputs['content'][$key];
                        $subtitle = $inputs['subtitle'][$key];
                        if(Input::hasFile('upload'))
                        {
                            $file = Input::file('upload');
                            $destinationPath = public_path(). '/img/country/';
                            if( !empty( $file[$key] ) ){
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

                        if(Input::hasFile('uploadheader'))
                        {
                            $hfile = Input::file('uploadheader');
                            $destinationPath = public_path(). '/img/country/';
                            if( !empty( $hfile[$key] ) ){
                             $headername = $hfile[$key]->getClientOriginalName();
                             $hfile[$key]->move($destinationPath, $headername);
                            }else{
                                $headername = '';
                            }
                        }
                        else
                        {
                            $headername = '';
                        }
                        CountryMenu::create([
                                'title' => $title,
                                'sub_title' => $subtitle,
                                'country_id' => $cid,
                                'featured_image' => $filename,
                                'header_image' => $headername,
                                'content' => $content,
                                'slug' => trim(strtolower($title)),
                                'url' => str_replace(' ', '-', strtolower($title)),
                                ]);
                    }
                    return redirect('admin/country-menu');
            }
        }
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function countrymenu_show($id)
        {
            //
        }
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function countrymenu_edit($id)
        {
            //
            $pageheader = 'Edit Country Menu';
            $countries = Country::get();
            $countriesmenus = CountryMenu::where('id',$id)->first();
            return view('backend.country.menu.edit',compact('pageheader','countries','countriesmenus'));
        }
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function countrymenu_update(Request $request, $id)
        {
            //
            $rules = array(
            'title' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/country/menu/edit'.$id)
                ->withErrors($validator);
            }
            else
            {
                $inputs = Input::all();
                  //echo '<pre>'; print_r($inputs); die();
                    $title = $inputs['title'];
                    $cid = $inputs['country'];
                        $content = $inputs['content'];
                        $subtitle = $inputs['subtitle'];
                        $filenames = DB::table('country_menu')->select('featured_image','header_image')->where('id',$id)->first();
                        if(Input::hasFile('upload'))
                        {
                            $file = Input::file('upload');
                            $destinationPath = public_path(). '/img/country/';
                             $filename = $file->getClientOriginalName();
                             $file->move($destinationPath, $filename);
                           
                        }
                        else
                        {
                            $filename = $filenames->featured_image;
                        }

                        if(Input::hasFile('uploadheader'))
                        {
                            $hfile = Input::file('uploadheader');
                            $destinationPath = public_path(). '/img/country/';
                             $headername = $hfile->getClientOriginalName();
                             $hfile->move($destinationPath, $headername);
                        
                        }
                        else
                        {
                            $headername = $filenames->header_image;
                        }
                     DB::table('country_menu')
                        ->where('id', $id)
                        ->update([
                            'title' => $title,
                            'sub_title' => $subtitle,
                            'country_id' => $cid,
                            'featured_image' => $filename,
                            'header_image' => $headername,
                            'content' => $content,
                            'slug' => trim(strtolower($title)),
                            'url' => str_replace(' ', '-', strtolower($title)),
                            ]);
                return Redirect::to('admin/country-menu');
            }
        }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function countrymenu_destroy($id)
        {
            //
            DB::table('country_menu')->where('id', '=', $id)->delete();
            return Redirect::to('admin/country-menu');
        }


        //==================Section of Country Management===================//
        public function section_index()
{
//
$pageheader = 'List of Country Section';
$countries = CountrySection::get();
return view('backend.country.section.list',compact('countries','pageheader'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function section_create()
{
//
$pageheader = 'Create Country Section';
$countries = Country::get();

return view('backend.country.section.create',compact('pageheader','countries'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function section_store(Request $request)
{
//
$rules = array(
'title' => 'required',
//'pageid' => 'required',
);
$validator = Validator::make(Input::all(), $rules);
if($validator->fails())
{
return Redirect::to('admin/country/section/create')
->withErrors($validator);
}
else
{
$inputs = Input::all();
$cid = $inputs['country'];
                   foreach( $inputs['counter'] as $key=>$input )
                   {
                        $title = $inputs['title'][$key];
                        $description = $inputs['content'][$key];
                        //$url = $inputs['url'][$key];
                        if(Input::hasFile('upload'))
                        {
                            $file = Input::file('upload');
                            $destinationPath = public_path(). '/img/country/';
                            if( !empty( $file[$key] ) ){
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
                           if(Input::hasFile('uploadheader'))
                        {
                            $hfile = Input::file('uploadheader');
                            $destinationPath = public_path(). '/img/country/';
                            if( !empty( $hfile[$key] ) ){
                             $headername = $hfile[$key]->getClientOriginalName();
                             $hfile[$key]->move($destinationPath, $headername);
                            }else{
                                $headername = '';
                            }
                        }
                        else
                        {
                            $headername = '';
                        }
                        CountrySection::create([
                                'title' => $title,
                                'c_id' => $cid,
                                'description' => $description,
                                'featured_image' => $filename,
                                'header_image' => $headername,
                                'url' => str_replace(' ', '-', strtolower($title)),
                                ]);
                    }
                    return redirect('admin/country/section');
            }
        }
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function section_show($id)
        {
            //
        }
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function section_edit($id)
        {
            //
            $pageheader = 'Edit Country Section';
            $countries = Country::get();
            $countriessection = CountrySection::where('id',$id)->first();
            return view('backend.country.section.edit',compact('pageheader','countries','countriessection'));
        }
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function section_update(Request $request, $id)
        {
            //
            $rules = array(
            'title' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/country/section/edit'.$id)
                ->withErrors($validator);
            }
            else
            {
                $inputs = Input::all();
                $filenames = DB::table('country_section')->select('featured_image')->where('id',$id)->first();
                    if(Input::hasFile('upload'))
                    {
                        $file = Input::file('upload');
                        $destinationPath = public_path(). '/img/country/';
                        $filename = $file->getClientOriginalName();
                        $file->move($destinationPath, $filename);
                    }
                    else
                    {
                        $filename = $filenames->featured_image;
                    }
                    if(Input::hasFile('uploadheader'))
                        {
                            $hfile = Input::file('uploadheader');
                            $destinationPath = public_path(). '/img/country/';
                             $headername = $hfile->getClientOriginalName();
                             $hfile->move($destinationPath, $headername);
                        
                        }
                        else
                        {
                            $headername = $filenames->header_image;
                        }
                    $title = $inputs['title'];
                    $description = $inputs['content'];
                    //$url = $inputs['url'];
                    $cid = $inputs['country'];
                     DB::table('country_section')
                        ->where('id', $id)
                        ->update([
                            'title' => $title,
                            'c_id' => $cid,
                            'content' => $description,
                            'featured_image' => $filename,
                            'header_image' => $headername,
                            'url' => str_replace(' ', '-', strtolower($title)),
                            ]);
                return Redirect::to('admin/country/section');
            }
        }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function section_destroy($id)
        {
            //
            DB::table('country_section')->where('id', '=', $id)->delete();
            return Redirect::to('admin/country/section');
        }

 //==================Accordion of Country Management===================//
public function accordion_index()
    {
    //
    $pageheader = 'List of Country Accordion';
    $countries = CountryAccordion::get();
    return view('backend.country.accordion.list',compact('countries','pageheader'));
    }
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function accordion_create()
    {
    //
    $pageheader = 'Create Country Accordion';
    $countries = Country::get();

    return view('backend.country.accordion.create',compact('pageheader','countries'));
    }
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function accordion_store(Request $request)
    {
    //
    $rules = array(
    'title' => 'required',
    //'pageid' => 'required',
    );
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails())
    {
    return Redirect::to('admin/country/accordion/create')
    ->withErrors($validator);
    }
    else
    {
    $inputs = Input::all();
    //echo '<pre>'; print_r($inputs); die();
    $cid = $inputs['country'];
                       foreach( $inputs['counter'] as $key=>$input )
                       {
                            $title = $inputs['title'][$key];
                            $description = $inputs['content'][$key];
                            
                            CountryAccordion::create([
                                    'title' => $title,
                                    'cid' => $cid,
                                    'content' => $description,
                                     ]);
                        }
                        return redirect('admin/country/accordion');
                }
     }
            /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
public function accordion_show($id)
        {
            //
        }
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
public function accordion_edit($id)
        {
            //
            $pageheader = 'Edit Country Accordion';
            $countries = Country::get();
            $countriesaccordion = CountryAccordion::where('id',$id)->first();
            return view('backend.country.accordion.edit',compact('pageheader','countries','countriesaccordion'));
        }
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
public function accordion_update(Request $request, $id)
        {
            //
            $rules = array(
            'title' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/country/accordion/edit'.$id)
                ->withErrors($validator);
            }
            else
            {
                $inputs = Input::all();
               
                    $title = $inputs['title'];
                     $cid = $inputs['country'];
                     $description = $inputs['content'];
                     DB::table('country_accordion')
                        ->where('id', $id)
                        ->update([
                            'title' => $title,
                            'cid' => $cid,
                            'content' => $description,
                             ]);
                return Redirect::to('admin/country/accordion');
            }
        }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
public function accordion_destroy($id)
        {
            //
            DB::table('country_accordion')->where('id', '=', $id)->delete();
            return Redirect::to('admin/country/accordion');
        }

        //==================Static Block of Country Management===================//

public function block_index()
    {
    //
    $pageheader = 'List of Country Block';
    $countries = CountryBlock::get();
    return view('backend.country.staticblock.list',compact('countries','pageheader'));
    }
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function block_create()
    {
    //
    $pageheader = 'Create Country Block';
    $countries = Country::get();
    return view('backend.country.staticblock.create',compact('pageheader','countries'));
    }
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function block_store(Request $request)
    {
    //
    $rules = array(
    'title' => 'required',
    //'pageid' => 'required',
    );
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails())
    {
    return Redirect::to('admin/country/block/create')
    ->withErrors($validator);
    }
    else
    {
    $inputs = Input::all();
    $ordernum = CountryBlock::orderBy('cid','desc')->first();
    if( count($ordernum) > 0 ){
        $neworder = $ordernum->order;
    }
    $cid = $inputs['country'];
    $k = 1;
                       foreach( $inputs['counter'] as $key=>$input )
                       {
                            $title = $inputs['title'][$key];
                            $description = $inputs['content'][$key];
                            $identifier = $inputs['identifier'][$key];
                            $url = $inputs['url'][$key];
                            $boption = $inputs['backgroundoption'][$key];
                            $bcolor = $inputs['bcolor'][$key];
                            if( count($ordernum) > 0){
                                $order = $neworder + $k ;
                            }else{
                               $order = $key;
                            }
                            if(Input::hasFile('featuredimg'))
                            {
                                $file = Input::file('featuredimg');
                                $destinationPath = public_path(). '/img/country/static';
                                if( !empty( $file[$key] ) ){
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
                            if(Input::hasFile('bfile'))
                            {
                                $bfile = Input::file('bfile');
                                $destinationPath = public_path(). '/img/country/static';
                                if( !empty( $bfile[$key] ) ){
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
                            CountryBlock::create([
                                    'title' => $title,
                                    'cid' => $cid,
                                    'identifier' => $identifier,
                                    'url' => $url,
                                    'boption' => $boption,
                                    'bimg' => $bfilename,
                                    'bcolor' => $bcolor,
                                    'content' => $description,
                                    'featured_image' => $filename,
                                    'order' => $order,
                                     ]);
                        $k++; 
                    }
                        return redirect('admin/country/block');
                }
     }
            /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
public function block_show($id)
        {
            //
        }
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
public function block_edit($id)
        {
            //
            $pageheader = 'Edit Country Block';
            $countries = Country::get();
            $countriesblock = CountryBlock::where('id',$id)->first();
            return view('backend.country.staticblock.edit',compact('pageheader','countries','countriesblock'));
        }
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
public function block_update(Request $request, $id)
        {
            //
            $rules = array(
            'title' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails())
            {
                return Redirect::to('admin/country/block/edit'.$id)
                ->withErrors($validator);
            }
            else
            {
                $inputs = Input::all();
                     $cid = $inputs['country'];
                     $title = $inputs['title'];
                            $description = $inputs['content'];
                            $identifier = $inputs['identifier'];
                            $url = $inputs['url'];
                            $boption = $inputs['backgroundoption'];
                            $bcolor = $inputs['bcolor'];
                            $filenames = DB::table('country_block')->select('featured_image','bimg')->where('id',$id)->first();
                    if(Input::hasFile('file'))
                    {
                        $file = Input::file('file');
                        $destinationPath = public_path(). '/img/country/static';
                        $filename = $file->getClientOriginalName();
                        $file->move($destinationPath, $filename);
                    }
                    else
                    {
                        $filename = $filenames->featured_image;
                    } 
                    if(Input::hasFile('bfile'))
                    {
                        $bfile = Input::file('bfile');
                        $destinationPath = public_path(). '/img/country/static';
                        $bfilename = $bfile->getClientOriginalName();
                        $bfile->move($destinationPath, $bfilename);
                    }
                    else
                    {
                        $bfilename = $filenames->bimg;
                    }
                     DB::table('country_block')
                        ->where('id', $id)
                        ->update([
                            'title' => $title,
                                    'cid' => $cid,
                                    'identifier' => $identifier,
                                    'url' => $url,
                                    'boption' => $boption,
                                    'bimg' => $bfilename,
                                    'bcolor' => $bcolor,
                                    'content' => $description,
                                    'featured_image' => $filename,
                             ]);
                return Redirect::to('admin/country/block');
            }
        }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
public function block_destroy($id)
        {
            //
            DB::table('country_block')->where('id', '=', $id)->delete();
            return Redirect::to('admin/country/block');
        }
    }