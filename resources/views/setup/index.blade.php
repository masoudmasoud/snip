@extends('layouts/setup')

{{-- Page title --}}
@section('title')
Create a User ::
@parent
@stop

{{-- Page content --}}
@section('content')

    <p>این صفحه یک بررسی سیستمی جهت صحت تنظیمات شما انجام می دهد. سیستم  اولین کاربر شما را در صفحه بعد اسجاد می کند.</p>
	
	


      <table class="table">
        <thead>
        <tr>
          <th class="col-lg-2">تنظیمات</th>
          <th class="col-lg-1">اعتبار</th>
          <th class="col-lg-9">یادداشت ها</th>
        </tr>
      </thead>
      <tbody>
        <tr{!! ($start_settings['url_valid']) ? ' class="success"' : ' class="danger"' !!}>
          <td>URL</td>
          <td>
            @if ($start_settings['url_valid'])
              <i class="fa fa-check preflight-success"></i>
            @else
              <i class="fa fa-times preflight-error"></i>
            @endif

          </td>
          <td>
            @if ($start_settings['url_valid'])
              That URL looks right! Good job!
            @else
              Uh oh! Snipe-IT thinks your URL is {{ $start_settings['url_config'] }}, but your real URL is {{ $start_settings['real_url'] }}
              لطفا تنظیمات <code>APP_URL</code> در فایل  <code>.env</code> را بروز رسانی کنید.
            @endif
          </td>
        </tr>
        <tr{!! ($start_settings['db_conn']===true) ? ' class="success"' : ' class="danger"' !!}>
          <td>پایگاه داده</td>
          <td>
            @if ($start_settings['db_conn']===true)
              <i class="fa fa-check preflight-success"></i>
            @else
              <i class="fa fa-times preflight-error"></i>
            @endif
          </td>
          <td>
              @if ($start_settings['db_conn']===true)
                اتصال به پایگاه داده برقرار شد <code>{{ $start_settings['db_name'] }}</code>
              @else
                اتصال برقرار نشد. لطفا تنظیمات پایگاه داده موجود در فایل  <code>.env</code> را بروز زسانی کنید. خطای پایگاه داده شما : <code>{{ $start_settings['db_error'] }}</code>
              @endif
          </td>
        </tr>
        <tr{!! (!$start_settings['env_exposed']) ? ' class="success"' : ' class="danger"' !!}>
          <td>Config File</td>
          <td>
            @if (!$start_settings['env_exposed'])
              <i class="fa fa-check preflight-success"></i>
            @else
              <i class="fa fa-times preflight-error"></i>
            @endif
          </td>
          <td>
              @if (!$start_settings['env_exposed'])
                Sweet. It doesn't look like your <code>.env</code> file is exposed to the outside world. (You should double check this in a browser though. You don't ever want anyone able to see that file. Ever. Ever ever.) <a href="../../.env">Click here to check now</a> (This should return a file not found or forbidden error.)
              @else
                Please make sure your <code>.env</code>. You don't ever want anyone able to see that file. Ever. Ever ever.  <a href="../../.env">Click here to check now</a> (This should return a file not found or forbidden error.)
              @endif
          </td>
        </tr>

        <tr{!! ($start_settings['prod']) ? ' class="success"' : ' class="warning"' !!}>
          <td>Environment</td>
          <td>
            @if ($start_settings['prod'])
              <i class="fa fa-check preflight-success"></i>
            @else
              <i class="fa fa-times preflight-error"></i>
            @endif
          </td>
          <td>
              @if ($start_settings['prod'])
                Your app is set to production mode. Rock on!
              @else
                Your app is set <code>{{ $start_settings['env'] }}</code> instead of <code>production</code> mode. If you're not planning on developing on Snipe-IT, please update your <code>APP_ENV</code> settings in your  <code>.env</code> file to <code>production</code>.
              @endif
          </td>
        </tr>

        <tr{!! (!$start_settings['owner_is_admin']) ? ' class="success"' : ' class="danger"' !!}>
          <td>File Owner</td>
          <td>
            @if (!$start_settings['owner_is_admin'])
              <i class="fa fa-check preflight-success"></i>
            @else
              <i class="fa fa-times preflight-error"></i>
            @endif
          </td>
          <td>
              @if (!$start_settings['owner_is_admin'])
                Your app files are owned by <code>{{ $start_settings['owner'] }}</code>. That doesn't look like a default root/admin account. Nice!
              @else
                It looks like your files are owned by <code>{{ $start_settings['owner'] }}</code>, which might be a root/admin account. It's never a good idea to run a website with escalated priveliges.
              @endif
          </td>
        </tr>

        <tr{!! (!$start_settings['writable']) ? ' class="danger"' : ' class="success"' !!}>
          <td>Permissions</td>
          <td>
            @if ($start_settings['writable'])
              <i class="fa fa-check preflight-success"></i>
            @else
              <i class="fa fa-times preflight-error"></i>
            @endif
          </td>
          <td>
              @if ($start_settings['writable'])
                Yippee! Your app storage directory seems writable.
              @else
                Uh-oh. Your <code>{{ storage_path() }}</code> directory (or sub-directories within) are not writable by the web-server. Those directories need to be writable by the web server in order for the app to work.
              @endif
          </td>
        </tr>

        <tr{!! ($start_settings['debug_exposed']) ? ' class="danger"' : ' class="success"' !!}>
          <td>Debug</td>
          <td>
            @if (!$start_settings['debug_exposed'])
              <i class="fa fa-check preflight-success"></i>
            @else
              <i class="fa fa-times preflight-error"></i>
            @endif
          </td>
          <td>
              @if (!$start_settings['debug_exposed'])
                Awesomesauce. Debug is either turned off, or you're running this in a non-production environment. (Don't forget to turn it off when you're ready to go live.)
              @else
                Yikes! You should turn off debug mode unless you encounter any issues. Please update your <code>APP_DEBUG</code> settings in your  <code>.env</code> file
              @endif
          </td>
        </tr>

        <tr{!! ($start_settings['gd']) ? ' class="success"' : ' class="warning"' !!}>
          <td>Image Library</td>
          <td>
            @if ($start_settings['gd'])
              <i class="fa fa-check preflight-success"></i>
            @else
              <i class="fa fa-times preflight-warning"></i>
            @endif
          </td>
          <td>
              @if ($start_settings['gd'])
                GD is installed. Go you!
              @else
                The GD library isn't installed. While this won't prevent the system from working, you won't be able to generate labels or upload images.
              @endif
          </td>
        </tr>
        <tr id="mailrow">
          <td>Email</td>
          <td id="mailtesticon">
          </td>
          <td id="mailtestresult">
             <button class="btn btn-default" id="mailtest"> Test Email</button>
              <span id="mailtestresult"></span>
          </td>
        </tr>

      </tbody>
      </table>



        @section('button')
          <form action="{{ route('setup.migrate') }}" method="GET">
            <button class="btn btn-primary">Next: Create Database Tables</button>
          </form>
        @parent
        @stop



@section('moar_scripts')
    <script type="text/javascript">
        $(document).ready(function () {

        $("#mailtest").click(function(){

              $("#mailtestresult").html('<i class="fa fa-spinner fa-spin"></i> Sending Email');

              $.ajax({url: "{{ route('setup.mailtest') }}", success: function(result){
                  if (result=='success') {
                    $("#mailrow").addClass('success');
                    $("#mailtesticon").html('<i class="fa fa-check preflight-success"></i>');
                    $("#mailtestresult").html('No errors on this end! Check your <code>{{ config('mail.from.address') }}</code> email account for a test email.');
                  } else {
                    $("#mailrow").addClass('danger');
                    $("#mailtesticon").html('<i class="fa fa-check preflight-error"></i>');
                    $("#mailtestresult").html('Something went wrong. Your email was not sent. Check your mail settings in your <code>.env</code> file.');

                  }


              },
              error: function (result) {
                $("#mailrow").addClass('danger');
                $("#mailtesticon").html('<i class="fa fa-check preflight-error"></i>');
                $("#mailtestresult").html('Something went wrong. The server returned an error. Check your mail settings in your <code>.env</code> file, and check your <code>storage/logs</code> for additional information..');
              }


            });

        });
     });
    </script>
@stop
@stop
