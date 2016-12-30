@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <div class="logo-section">
                <img alt="" src="{{ asset('/img/3hammers.png')}}">
            </div>
        </div><!-- /.login-logo -->

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-box-body">
    <!-- <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p> -->
    <form action="{{ url('/login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <!-- <span class="glyphicon glyphicon-envelope"></span> -->
            <!-- <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/> -->
            <label>Email Address</label>
            <input type="email" class="form-control" name="email"/>
        </div>
        <div class="form-group has-feedback">
<!--             <span class="glyphicon glyphicon-lock"></span> -->
        <label>Password</label>
            <!-- <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/> -->
            <input type="password" class="form-control" name="password"/>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.buttonsign') }}</button>
            </div><!-- /.col -->
        </div>
    </form>

   

    <!-- <a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br> -->
    <!-- <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a> -->

</div><!-- /.login-box-body -->

</div><!-- /.login-box -->

    @include('layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-orange',
                radioClass: 'iradio_square-orange',
                increaseArea: '20%' // optional
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($) {

           if (!String.prototype.trim) {
             (function() {
              // Make sure we trim BOM and NBSP
              var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
              String.prototype.trim = function() {
               return this.replace(rtrim, '');
              };
             })();
            }

            [].slice.call( document.querySelectorAll( '.form-control' ) ).forEach( function( inputEl ) {
             // in case the input is already filled..
             
             if( inputEl.value.trim() !== '' ) {
              classie.add( inputEl.parentNode, 'open' );
             }

             // events:
             inputEl.addEventListener( 'focus', onInputFocus );
             inputEl.addEventListener( 'blur', onInputBlur );
            } );

            function onInputFocus( ev ) {
             classie.add( ev.target.parentNode, 'open' );
            }

            function onInputBlur( ev ) {
             if( ev.target.value.trim() === '' ) {
              classie.remove( ev.target.parentNode, 'open' );
             }
            }
    

        });

    </script>
</body>

@endsection
