<?php
  if(!isset($_SESSION))
  {
      session_start();
  }

session_destroy();

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HR-FIDELITY | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition login-page">
<div  type="checkbox" class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
 
    <div class="card-header text-center">
    <img src="hr.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="80px" width="80px" style="opacity: .8">
    
   
      
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id = "Login" name = "Login" method = "POST">
        <div class="input-group mb-3">
          <input type="text" id ="LoginUsername" name = "LoginUsername"class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope "></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id = "LoginPassword" name = "LoginPassword" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      
      <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<script type="text/javascript">
var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
</script>
<script type = "text/javascript">
  $(document).ready(function() {
$("#Login").submit(function(event) {
  event.preventDefault(); //prevent submit
  var form = $(this);
  var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
    
    $.ajax({
        type: "POST",
        cache: false,
        url: 'Pages(1)/Process/Process_Login.php',
        data: form.serialize(),
        success:function(data){
          var response_data = JSON.parse(data);
          var path = JSON.parse(data);
          Toast.fire({
          icon: response_data.icon,
          title: response_data.message,
        });
   
        if(response_data.message == 'Login Successfully Welcome')
        {
          window.location.replace("http://localhost/HR-Fidelity/indexHR.php");
        } 
        else if(response_data.message ==  'Login Successfully Welcome Superadmin!')
        {
          window.location.replace("http://localhost/HR-Fidelity/indexSuperadmin.php");
        }
        else if (response_data.message =='Login Successfully Welcome Employee')
        {
          window.location.replace("http://localhost/HR-Fidelity/indexEmployee.php");
        }
        

        }
    });
  
  }
);
});
</script>


</body>
</html>
