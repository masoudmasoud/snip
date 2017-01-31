@extends('layouts/setup')

{{-- Page title --}}
@section('title')
Create a User ::
@parent
@stop

{{-- Page content --}}
@section('content')




      <div class="col-lg-12" style="padding-top: 20px;">

        @if (trim($output)=='Nothing to migrate.')
        <div class="col-md-12">
            <div class="alert alert-warning">
                <i class="fa fa-warning"></i>
			هیچ چیز برای انتقال وجود دارد. جداول پایگاه داده تنظیم شده است!
            </div>
        </div>
        @else
        <div class="col-md-12">
            <div class="alert alert-success">
                <i class="fa fa-check"></i>
               جداول پایگاه داده ساخته شده اند
            </div>
        </div>

        @endif

        <p>خروجی انتقال</p>
        <pre>{{ $output }}</pre>
        </div>

@stop

@section('button')
  <form action="{{ route('setup.user') }}" method="GET">
    <button class="btn btn-primary">بعدی: ایجاد کاربر</button>
  </form>
@parent
@stop
