@extends('frontend.master')
@section('content')
<section class="main-wrapper">

	<div class="course-detail">
        @if(!empty($college->header_image))
        <div class="page-style-1 bg-image" style="background-image:url({{ asset( '/img/college/'.$college->header_image ) }});">
		@else
        <div class="page-style-1" style="background-color:#0066B1;">
        @endif    
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title">College Detail</h1>
                    </div>
                </div>
                
            </div>
        </div>
		
		<div class="container mt40">
			<div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to( '/' )}}">Home</a></li>
                            <li><a href="{{URL::to( '/course/searchform' )}}">College</a></li>
                            <li class="active">{{ $college->college_name }}</li>
                        </ol>
                    </div>
                </div>
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="course-detail-wrap">
						<h3 class="news-heading">
								{{ $college->college_name }}
						</h3>
					</div>
					<hr>
					<div class="row">
                        <div class="col-md-3">
                            
                            @if(!empty($college->images))
                            <img class="logo" src="{{ asset( '/img/college/'.$college->images ) }}" alt="{{ $college->college_name }}">
                            @else
                            <img class="logo" src="{{ asset( '/img/noimages.jpg/') }}" alt="">
                            @endif
                          </div>
                        <div class="col-md-9 description">
                            {!! $college->college_detail !!}                    
                        </div>
                        
                        
                    </div>
                  
                    <?php
                     $instype = DB::table('universities')->where('u_id',$college->uni_id)->first(); 
                     $location = DB::table('locations')->where('id',$college->location)->first(); 
                    ?>
                    @if(!empty($college->location))
                    <div class="row">
                    	<div class="col-md-12">
                    		<h3>At a glance</h3>
                    		<div class="table-responsive">
	                    		<table class="table table-glance">
			                        <tbody>
			                        	<tr>
                                            <th>Location:</th>
                                            <td class="bold">
                                                {{ $location->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Institution Type:</th>
                                            <td class="bold">
                                                {{ $instype->university_name }}
                                            </td>
                                        </tr>
                                        <tr>
			                                <th>Contact:</th>
			                                <td class="bold">
			                                    {{ $college->contact }}
			                                </td>
			                            </tr>
			                         			                      
									</tbody>
								</table>
                    			
                    		</div>
                    	</div>
                    </div>
                    @endif
                   
                    <?php 
                     $collegetabs = DB::table('college_tabs')->where('clz_id',$college->collegeid)->get();
                    ?>    
                    @if(count($collegetabs) > 0 )
                    <div class="row mt40">
                    	<div class="col-md-12">
                    		<div class="margin-25 hidden-sm hidden-xs">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach( $collegetabs as $key => $ctab )
                            <li role="presentation" class="<?php if($key == 0){ echo 'active';}?>">
                                <a href="#{{ $ctab->slug }}" aria-controls="{{ $ctab->slug }}" role="tab" data-toggle="tab" aria-expanded="<?php if($key == 0){ echo 'true';} else { echo 'false'; }?>">{{ $ctab->title }}</a></li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach( $collegetabs as $key => $ctab )
                            <div role="tabpanel" class="tab-pane <?php if($key == 0){ echo 'active';}?>" id="{{$ctab->slug}}">
                            {!! $ctab->content!!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    	</div>
                    </div>
                    @endif
				</div>
                <?php
                 $collegelist = DB::table('college_details')->where('collegeid','!=',$college->collegeid)->get();
                ?>
                @if( count($collegelist) > 0 )
				<div class="col-md-4 col-sm-4">
					<div class="sidebar-wrapper">
                            <aside>
                                <h2 class="sidebar-title">Similar Institutions</h2>
                                @foreach( $collegelist as $key => $list)
                                <div class="media">
                                    @if(!empty($list->images))
                                    <div class="media-left bg-image" style="background-image:url({{ asset( '/img/college/'.$list->images ) }});"></div>
                                    @else
                                    <div class="media-left bg-image" style="background-image:url({{ asset( '/img/noimages.jpg/' ) }});"></div>
                                    @endif                                      
                                    <div class="media-body">
                                        <a href="#">
                                            <h4 class="media-heading">{{ $list->college_name }}</h4>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </aside>
                        </div>
				</div>
				@endif
			</div>
		</div>
	</div>
</section>			
@stop