@extends('layouts/setup')

{{-- Page title --}}
@section('title')
Create a User ::
@parent
@stop

{{-- Page content --}}
@section('content')




      <div class="col-lg-12" style="padding-top: 20px;">

        <div class="col-md-12">
            <div class="alert alert-warning">
                <i class="fa fa-check"></i>
                کاربر مدیر شما اضافه شد!
            </div>
        </div>

        <p>برای مرود به سیستم کلیک کنید! <a href="{{ config('app.url') }}">{{ config('app.url') }}</a></p>

      </div>

@stop
