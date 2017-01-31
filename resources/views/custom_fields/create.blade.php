@extends('layouts/default')

{{-- Page title --}}
@section('title')
  {{ trans('admin/custom_fields/general.create_fieldset') }}
@parent
@stop

@section('header_right')
<a href="{{ URL::previous() }}" class="btn btn-primary pull-right">
  {{ trans('general.back') }}</a>
@stop


{{-- Page content --}}
@section('content')

<div class="row">
<div class="col-md-9">
  <!-- Horizontal Form -->
    <div class="box box-default">
      <div class="box-body">


        {{ Form::open(['route' => 'admin.custom_fields.store', 'class'=>'form-horizontal']) }}
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <!-- Name -->
            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">{{ trans('admin/custom_fields/general.fieldset_name') }}
                 <i class='fa fa-asterisk'></i></label>
                 </label>
                    <div class="col-md-6">
                      <input class="form-control" type="text" name="name" id="name" value="{{ Input::old('name') }}" />
                      {!! $errors->first('name', '<span class="alert-msg"><i class="fa fa-times"></i>پیام: </span>') !!}
                    </div>
            </div>
          </div>
          <div class="box-footer text-left">
            <button type="submit" class="btn btn-success"><i class="fa fa-check icon-white"></i> {{ trans('general.save') }}</button>
          </div>


        {{ Form::close() }}
      </div>
</div>
<div class="col-md-3">
  <h4>درمورد فیلد</h4>
  <p>  مانند ظروفی از فیلهای سفارشی که ساخته اید عمل می کنند. به شما اجازه می دهند تا فیلد هایی که به طور معمول در یک محیط هستند را گروه بندی کنید. </p>
</div>

@stop
