@extends('layouts/basic')

{{-- Page title --}}
@section('title')
403
@parent
@stop

{{-- Page content --}}

@section('content')



<div class="row">
  <div class="col-md-12">

    <div class="error-page" style="padding-top: 200px;direction:rtl;">
      
            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> خطای 403 ، شما دسترسی لازم را ندارید.</h3>
              <p>
                <a href="{{ route('home') }}">برگشت به میز کار</a> یا با مدیریت سیستم تماس بگیرید.
              </p>

    </div>
</div>
@stop
