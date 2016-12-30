<header class="main-header" id="home">
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to("") }}">
            <img src="{{ asset('/img/'.$home->logo ) }}" alt="" id="logo" /></a>
        </div>
        <div class="navbar-collapse collapse ">
          <ul class="nav navbar-nav navbar-right">
            @if($menus)
               @foreach( $menus as $menu)
                @if($slug != '')
                    <li class="<?php if($menu->url == $slug){ echo 'active';}?>">
                      @else
                    <li>
                @endif      
                      <a href="{{ URL::to('/'.$menu->url) }}">{{ $menu->title }}</a>
                        <?php 
                        $sub_menu = \DB::table('menus')->where('parent_id', $menu->id)->orderby('order', 'asc')->get();
                        ?>
                          @if($sub_menu)
                          <ul class="sub-menu">
                            @foreach($sub_menu as $s_menu)
                              <li><a href="{{url().'/'.$s_menu->url}}">{{$s_menu->title}}</a></li>
                            @endforeach 
                          </ul>
                          @endif
                    </li>
               @endforeach
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
</header>