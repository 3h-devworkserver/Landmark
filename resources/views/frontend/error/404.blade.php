@extends('layouts.error')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.pagenotfound') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.404error') }}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')

<div class="error-page" style="margin-top:250px;">
    <h2 class="headline text-yellow"> 404</h2>
    <div class="error-content">
        <h3 style="color:#fff;"><i class="fa fa-warning text-yellow"></i> Oops! {{ trans('adminlte_lang::message.pagenotfound') }}.</h3>
        <p style="color:#fff;">
            {{ trans('adminlte_lang::message.notfindpage') }}
            {{ trans('adminlte_lang::message.mainwhile') }} <a href='{{ url('/') }}'>{{ trans('return to home') }}</a> {{ trans('adminlte_lang::message.usingsearch') }}
        </p>
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
@endsection