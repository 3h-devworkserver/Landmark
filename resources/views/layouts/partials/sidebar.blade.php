<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
    <!--     <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-file-text-o'></i> <span>{{ trans('Posts') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/post') }}"><i class='fa fa-angle-right'></i>{{ trans('All Posts') }}</a></li>
                    <li><a href="{{ url('post/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Post') }}</a></li>
                    <li><a href="{{ url('post/add/category') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Category') }}</a></li>
                </ul>
            </li>
           <li class="treeview"><a href="{{ url('#') }}"><i class='fa fa-files-o'></i> <span>{{ trans('Pages') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('page/list') }}"><i class='fa fa-angle-right'></i>{{ trans('All Pages') }}</a></li>
                    <li><a href="{{ url('page/new') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Page') }}</a></li>
                </ul>
            </li>
            <li class="treeview"><a href="{{ url('#') }}"><i class='fa fa-support'></i> <span>{{ trans('Static Block') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('static/block/list') }}"><i class='fa fa-angle-right'></i>{{ trans('All Static Block') }}</a></li>
                    <li><a href="{{ url('static/block/new') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Static Block') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-image'></i> <span>{{ trans('Slider') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/slider') }}"><i class='fa fa-angle-right'></i>{{ trans('All Slider') }}</a></li>
                    <li><a href="{{ url('slides/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Create Slider') }}</a></li>
                </ul>
            </li>
            <li class=""><a href="{{ url('admin/menus') }}"><i class='fa fa-link'></i> <span>{{ trans('Menu') }}</span></a></li>
            <!-- 
            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li> -->
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-cogs'></i> <span>{{ trans('Settings') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('setting/generals') }}"><i class='fa fa-angle-right'></i>{{ trans('General') }}</a></li>
                    <li><a href="{{ url('setting/seo') }}"><i class='fa fa-angle-right'></i>{{ trans('SEO') }}</a></li>
                    <li><a href="{{ url('setting/social') }}"><i class='fa fa-angle-right'></i>{{ trans('Social Links') }}</a></li>
                    <li><a href="{{ url('setting/email/notify') }}"><i class='fa fa-angle-right'></i>{{ trans('Admin Email Notify') }}</a></li>
                    <li><a href="{{ url('setting/news-events/notify') }}"><i class='fa fa-angle-right'></i>{{ trans('Admin News/Events Email') }}</a></li>
                </ul>
            </li>
            <!-- <li class="treeview">
                <a href="{{ url('theme/setting') }}"><i class='fa fa-paint-brush'></i> <span>{{ trans('Theme Option') }}</span><i class="fa fa-angle-left pull-right"></i></a>
            </li> --> 
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-envelope-o'></i> <span>{{ trans('Contact') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/contact') }}"><i class='fa fa-angle-right'></i>{{ trans('All Contact') }}</a></li>
                    <li><a href="{{ url('contact/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Contact') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-comment-o'></i> <span>{{ trans('Testimonials') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/testimonials') }}"><i class='fa fa-angle-right'></i>{{ trans('All Testimonials') }}</a></li>
                    <li><a href="{{ url('testimonials/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Testimonial') }}</a></li>
                </ul>
            </li> 
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-file-text-o'></i> <span>{{ trans('News &amp; Events') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/events') }}"><i class='fa fa-angle-right'></i>{{ trans('All News &amp; Events') }}</a></li>
                    <li><a href="{{ url('events/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add News &amp; Event') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-file-text-o'></i> <span>{{ trans('Course Management') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="javascript:;"><i class='fa fa-list'></i> <span>{{ trans('Institute Type List') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/university') }}"><i class='fa fa-angle-right'></i>{{ trans('All Institute Types') }}</a></li>
                            <li><a href="{{ url('admin/university/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Institute Type') }}</a></li>
                            </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:;"><i class='fa fa-list'></i> <span>{{ trans('College List') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/college') }}"><i class='fa fa-angle-right'></i>{{ trans('All Colleges') }}</a></li>
                            <li><a href="{{ url('admin/college/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add College') }}</a></li>
                            </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:;"><i class='fa fa-list'></i> <span>{{ trans('College Tab List') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/collegetab') }}"><i class='fa fa-angle-right'></i>{{ trans('All College tabs') }}</a></li>
                            <li><a href="{{ url('admin/collegetab/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add College tab') }}</a></li>
                            </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:;"><i class='fa fa-list'></i> <span>{{ trans('Course List') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/course') }}"><i class='fa fa-angle-right'></i>{{ trans('All Courses') }}</a></li>
                            <li><a href="{{ url('admin/course/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Course') }}</a></li>
                            </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:;"><i class='fa fa-list'></i> <span>{{ trans('Course Tab List') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/coursetab') }}"><i class='fa fa-angle-right'></i>{{ trans('All Course Tabs') }}</a></li>
                            <li><a href="{{ url('admin/coursetab/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Course Tab') }}</a></li>
                            </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-map-o'></i> <span>{{ trans('Country Management') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="javascript:;"><i class='fa fa-list'></i> <span>{{ trans('Country List') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/country') }}"><i class='fa fa-angle-right'></i>{{ trans('All List') }}</a></li>
                            <li><a href="{{ url('admin/country/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add New') }}</a></li>
                            </ul>
                    </li>
                    <li class="treeview">
                            <a href="javascript:;"><i class='fa fa-list-alt'></i> <span>{{ trans('Country Section') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/country/section') }}"><i class='fa fa-angle-right'></i>{{ trans('All List') }}</a></li>
                            <li><a href="{{ url('admin/country/section/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add New') }}</a></li>
                            </ul>                    
                    </li>
                    <li class="treeview">
                            <a href="javascript:;"><i class='fa fa-bars'></i> <span>{{ trans('Country Menus') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/country-menu') }}"><i class='fa fa-angle-right'></i>{{ trans('All List') }}</a></li>
                            <li><a href="{{ url('admin/country/menu/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add New') }}</a></li>
                            </ul>                    
                    </li> 
                    <li class="treeview">
                            <a href="javascript:;"><i class='fa fa-align-justify'></i> <span>{{ trans('Country Accordion') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/country/accordion') }}"><i class='fa fa-angle-right'></i>{{ trans('All List') }}</a></li>
                            <li><a href="{{ url('admin/country/accordion/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add New') }}</a></li>
                            </ul>                    
                    </li>
                    <li class="treeview">
                            <a href="javascript:;"><i class='fa fa-support'></i> <span>{{ trans('Country Static Block') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/country/block') }}"><i class='fa fa-angle-right'></i>{{ trans('All List') }}</a></li>
                            <li><a href="{{ url('admin/country/block/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add New') }}</a></li>
                            </ul>                    
                    </li>
                    <li class="treeview">
                            <a href="javascript:;"><i class='fa fa-university'></i> <span>{{ trans('Country Universities') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                            <li><a href="{{ url('admin/country/universities') }}"><i class='fa fa-angle-right'></i>{{ trans('All List') }}</a></li>
                            <li><a href="{{ url('admin/country/universities/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add New') }}</a></li>
                            </ul>                    
                    </li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
