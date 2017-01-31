@extends('layouts/basic')

{{-- Page title --}}
@section('title')
404
@parent
@stop

{{-- Page content --}}

@section('content')



<div class="row">
  <div class="col-md-12">

    <div class="error-page" style="padding-top: 200px;direction:rtl;">
            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i>خطای 404 ، صفحه مورد نظر یافت نشد</h3><br>
              <h4>
                
                شما شاید درخواست<a href="{{ route('home') }}"> برگشت به میز کار </a> را دارید.
              </h4>

    </div>
</div>
@stop
