@extends('layouts/default')

{{-- Page title --}}
@section('title')
ایجاد کاربر
@parent
@stop

@section('header_right')
<a href="{{ route('users') }}" class="btn btn-default"> {{ trans('general.back') }}</a>
@stop

{{-- Page content --}}
@section('content')


<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-default">
      <div class="box-body">
        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

			@if (Session::get('message'))
			<p class="alert-danger">
				فایل شما خاوی خطا می باشد:<br />
				{{ Session::get('message') }}
			</p>
			@endif

			<p>
				فایل csv با یک یا چند کاربر را بارگذاری کنید. رمز عبور کاربران به صورت خودکار تولید می شود.فیلد <strong>اول</strong> فایل شما باید دارای موارد زیر باشد: </p>
				

        <p><strong>نام، نام خانوادگی، نام کاربری، ایمیل، شماره مکان، شماره تماس، عنوان شغل، شماره استخدام، شماره شرکت</strong>. </p>
		

        <p>فیلد های اضافی نادیده گرفته خواهند شد. (ایمیل اختیاری است)</p>

            @if (config('app.lock_passwords'))
                <p>نکته: اعلانات ایمیلی برای کاربران در این سیستم غیر فعال شده است</p>
				
            @endif

            <div class="form-group {!! $errors->first('user_import_csv', 'has-error') }}">
                <label for="first_name" class="col-sm-3 control-label">{{ trans('admin/users/general.usercsv') }}</label>
        				<div class="col-sm-5">
        					<input type="file" name="user_import_csv" id="user_import_csv">
        				</div>
            </div>

            <!-- Has Headers -->
    			<div class="form-group">
    				<div class="col-sm-2 ">
    				</div>
    				<div class="col-sm-5">
    					{{ Form::checkbox('has_headers', '1', Input::old('has_headers')) }} فایل شما دارای هدر می باشد
    				</div>
    			</div>


    			<!-- Email user -->
    			<div class="form-group">
    				<div class="col-sm-2 ">
    				</div>
    				<div class="col-sm-5">
    					{{ Form::checkbox('email_user', '1', Input::old('email_user')) }} اطلاعات کاربران برایشان ایمیل شود</div>
    			</div>

    			<!-- Activate -->
    			<div class="form-group">
    				<div class="col-sm-2 ">
    				</div>
    				<div class="col-sm-5">
    					{{ Form::checkbox('activate', '1', Input::old('activate')) }} فعال کردن کاربر</div>
    			</div>



        </div>

    <!-- Form Actions -->
    <div class="box-footer text-left">
      <button type="submit" class="btn btn-default">{{ trans('button.submit') }}</button>
    </div>

</form>
</div></div></div></div>
<script>
$(document).ready(function(){

    $('#generate-password').pGenerator({
        'bind': 'click',
        'passwordElement': '#password',
        'displayElement': '#password-display',
        'passwordLength': 10,
        'uppercase': true,
        'lowercase': true,
        'numbers':   true,
        'specialChars': false,

    });
});

</script>
@stop
