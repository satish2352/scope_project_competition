<!DOCTYPE html>
<html>
<head>
  <title>DM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
   <div class="row">
      <div class="col-lg-12 d-flex align-items-center justify-content-center">
         <div class="auth-form-transparent text-left p-3">
            <!--  brand logo -->
            <div class="row w-100 ">
               <div class="col-lg-12 mx-auto">
                  <div class="auth-form-light text-center login_wrap">

                     <div class="thanks-icon mt-0">
                     
                        <img class="set_logo" src="{{ Config::get('DocumentConstant.WEBSITE_LOGO_VIEW') }}" alt="" style="width: 15%;margin-top:15px;">
               
                     </div><br>
                     
                        <p>
                        Dear Sir/Ma'am,
                        <br><br>
                        {{date_default_timezone_set("Asia/Kolkata")}}
                        Please find attached database backup file for dated {{date('d-m-Y')}} of <b>Disaster Management Web Portal</b>. Please store it securely.
                        <br><br>
                        Thank you.
                        <br>
                        Best regards, <br>
                        Disaster Management Web Portal <br>
                        </p>
                     
                     <div class="text-center mt-4 font-weight-light">
                   
                </div>

                  </div>
               </div>
            </div>
           
         </div>
      </div>
          <!--  Copyright text -->
          <div class="col-lg-12 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright © {{date('Y')}}. All rights reserved with Disaster Management.</p>
         </div>
   </div>
</div>       

</body>
</html>