<!DOCTYPE html>


<?php
/* This will give an error. Note the output
 * above, which is before the header() call */
header('Location: ./public');
exit;
?>


<html>
    <head>
      <title>
         مدیریت دارایی های فناوری اطلاعات
      </title>
		

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">



        <style>
          td, th {
            font-size: 14px;
          }

          .preflight-success {
            color: green;
          }

          .preflight-error {
            color: red;
          }

          .preflight-warning {
            color: orange;
          }

          .page-header {
            font-size: 280%;
          }

          h3 {
            font-size: 250%;
          }

          .alert {
            font-size: 16px;
          }

        </style>

    </head>
    <body>
          <div class="container">
              <div class="row">
                  <div class="center">
                        <a href="./public">برای ورود به سیستم کلیک کنید</a>
						
                  </div>
              </div>
          </div>

    </body>
</html>
