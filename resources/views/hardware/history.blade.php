@extends('layouts/default')

{{-- Page title --}}
@section('title')
   پیشینه واردات
    @parent
@stop

@section('header_right')
    <a href="{{ route('hardware') }}" class="btn btn-default"> {{ trans('general.back') }}</a>
@stop

{{-- Page content --}}
@section('content')


    @if (isset($status))

        @if (count($status['error']) > 0)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="box box-default">
                        <div class="alert alert-danger">
                            <i class="fa fa-exclamation-circle faa-pulse animated"></i>
                            <strong>{{ count($status['error']) }} پیام های خطا: </strong>
                            لطفا خطاهای موجود در پایین صفحه را مشاهده کنید. 
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-default">
                    <div class="alert alert-success">
                        <i class="fa fa-check faa-pulse animated"></i>
                        <strong>{{ count($status['success']) }} پیام های موفقیت: </strong>
                        برای مشاهده جزئیات به پایین صفحه بروید.
                    </div>
                </div>
            </div>
        </div>

        @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-body">
                    <div class="col-md-12">
                    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        @if (Session::get('message'))
                            <p class="alert-danger">
                               فایل شما حاوی خطا است:<br />
                                {{ Session::get('message') }}
                            </p>
                        @endif

                        <p>
                           فایل CSV حاوی پیشینه دارایی را بارگذاری کنید. دارایی ها و کاربران باید در سیستم موجود باشند در غیر اینصورت نادیده گرفته می شوند. تطبیق دارایی های پیشینه واردات در مقابل برچسب دارایی صورت می گیرد. سیستم سعی در یافتن کاربری مطابق با نام کاربرانی که شما وارد می کنید ومعیارهایی که در زیر انتخاب می کنید را دارد. اگر معیاری انتخاب نشود سیستم سعی در تطبیق با فرمت نام کربری موجود در مدیریت &lt; تنظیمات را دارد.
                        </p>

                        <p> قسمت های موجود در فایل باید شامل سربرگهای : <strong> تاریخ، برچسب، نام </strong> باشد. هر قسمت اضافی دیگری نادیده گرفته خواهد شد. </p>

                        <p><strong>تاریخ</strong> باید تاریخ چک اوت باشد. <strong>برچسب</strong> باید برچسب دارایی باشد. <strong>نام</strong> باید نام کاربر باشد. (نام و نام خانوادگی)</p>

                        <p><strong>پیشینه باید بر اساس تاریخ و به صورت صعودی مرتب شده باشند.</strong></p>

                        <div class="form-group">
                            <label for="first_name" class="col-sm-3 control-label">{{ trans('admin/users/general.usercsv') }}</label>
                            <div class="col-sm-9">
                                <input type="file" name="user_import_csv" id="user_import_csv">
                            </div>
                        </div>




                <!-- Match firstname.lastname -->
                <div class="form-group">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                        {{ Form::checkbox('match_firstnamelastname', '1', Input::old('match_firstnamelastname')) }}
						تطبیق کاربران با استفاده از فرمت نام و نام خانوادگی مانند (علی.احمدی)
                    </div>
                </div>

                <!-- Match flastname
                <div class="form-group">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                        {{ Form::checkbox('match_flastname', '1', Input::old('match_flastname')) }} Try to match users by first initial last name (jsmith) format
                    </div>
                </div>

                 Match firstname -->
                <div class="form-group">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                        {{ Form::checkbox('match_firstname', '1', Input::old('match_firstname')) }} تطبیق کاربران با استفاده از نام کوچک مانند (علی)
                    </div>
                </div>

                <!-- Match email -->
                <div class="form-group">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                        {{ Form::checkbox('match_email', '1', Input::old('match_email')) }} تطبیق کاربران با استفاده از ایمیل به عنوان نام کاربری
                    </div>
                </div>


               </div>



        </div>

    <!-- Form Actions -->
    <div class="box-footer text-left">
      <button type="submit" class="btn btn-default">{{ trans('button.submit') }}</button>
    </div>

</form>

 </div>

            @if (isset($status))


                @if (count($status['error']) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title"> {{ count($status['error']) }} پیام های خطا </h3>
                            </div>
                            <div class="box-body">
                                <div style="height : 400px; overflow : auto;">
                                    <table class="table">
                                        @for ($x = 0; $x < count($status['error']); $x++)
                                            @foreach($status['error'][$x] as $object_type => $message)
                                            <tr class="danger">
                                                <td><strong>{{ ucwords($object_type)  }} {{ key($message)  }}:</strong></td>
                                                <td>{{ $message[key($message)]['msg']  }}</td>
                                            </tr>
                                            @endforeach
                                        @endfor
                                    </table>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif

                @if (count($status['success']) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"> {{ count($status['success']) }} پیام های موفقیت </h3>
                                    </div>
                                    <div class="box-body">
                                        <div style="height : 400px; overflow : auto;">
                                            <table class="table">
                                                @for ($x = 0; $x < count($status['success']); $x++)
                                                    @foreach($status['success'][$x] as $object_type => $message)
                                                        <tr class="success">
                                                            <td><strong>{{ ucwords($object_type)  }} {{ key($message)  }}:</strong></td>
                                                            <td>{{ $message[key($message)]['msg']  }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endfor
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
            @endif

        </div></div></div>
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
