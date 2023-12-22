<?php 
  if(!isset($_SESSION))
  {
      session_start();
      require('../connection.php');    
  }

  if($_SESSION['employee_name'] == "" && $_SESSION['employee_ID'] =="")
    {
        header("Location: /HR-Fidelity/Login.php");
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HR Fidelity</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="https://kit.fontawesome.com/ff86b34ee8.js" crossorigin="anonymous"></script>
  <script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../hr.jpg" alt="AdminLTELogo" height="200" width="200">
  </div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../indexHR.php" class="brand-link">
      <img src="../hr.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HR-Fidelity</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../user (3).png"class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="../indexHR.php" class="d-block"><?php echo $_SESSION["employee_name"] ?>
          <br>
          <p class = "font-weight-light" style = "font-size: 13px;"  ><?php echo $_SESSION["Employee_Job_Title"] ?></p></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../indexHR.php" class="nav-link in-active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item" >
          <a href="#" class="nav-link">
          <i class="fa fa-users" aria-hidden="true"></i>  
              <p>
                Manage Employee
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="Department.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ManageEmployee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Manage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Warning.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warning</p>
                </a>
              </li>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-calendar" aria-hidden="true"></i>
              <p>
                Leave Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Setup
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="ManageHoliday.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Holiday</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ManageHoliday.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Public Holiday</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="LeaveConfigure.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Configure</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Leave information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="LeaveReport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Report</p>
                </a>
              </li>
            </ul>
          </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>  
              <p>
                Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Setup
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="ManageWorkShift.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Work shift</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="MontlyAttendance.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Attendance</p>
                </a>
              </li>
            </ul>
          </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-usd" aria-hidden="true"></i>
              <p>
                Payroll
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Setup
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            </ul>
          </li>
          <li class="nav-item">
                <a href="Allowance.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Allowance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="MonthlyPayGrade.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Pay Grade</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Manage Work Hours
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Manage Bonus
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            </ul>
          </li>
            </ul>
          </li>
        <li class="nav-item">
            <a href="../Login.php" class="nav-link in-active">
            <i class="fa fa-sign-out" aria-hidden="true"></i>  
              <p>
              Log-Out
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <section class="content">
      <div class="container-fluid" >
        <div class="row">
          <div class="col-12" >
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Payroll</h3>
  </div>
  <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
             Payroll Information
            </h3>
          </div>
          
          <div class="row">
          <?php
          $EmployeeName = $_SESSION['employee_name'];
          if(isset($EmployeeName)){
          $sql = "SELECT tbl_employee_payroll.Payroll_ID, tbl_employee_payroll.Employee_ID, tbl_employee_payroll.Employee_Name, tbl_employee_payroll.Tax,tbl_employee_payroll.SSS,tbl_employee_payroll.Philhealth,tbl_employee_payroll.Pag_ibig, tbl_employee_payroll.Gross_Pay, tbl_employee_payroll.Net_Pay, tbl_employee_payroll.Total_Deduction, tbl_employee_payroll.Date_Payroll, tbl_employees.Employee_JobTitle FROM `tbl_employee_payroll` INNER JOIN tbl_employees ON tbl_employee_payroll.Employee_Name = tbl_employees.employee_name WHERE tbl_employees.employee_name = '$EmployeeName'";

          $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              $i = 1;
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {   
              

                  ?>

  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
      <p ><span class = "border">Employee Name: <span> <?php echo $row['Employee_Name'];?>
    <br>Employee Job Title: <span> <?php echo $row['Employee_JobTitle'];?>
    <br>Salary Deductions
    <br>Tax: <?php echo $row['Tax']; ?>
    <br>SSS: <?php echo $row['SSS']; ?>
    <br>Philhealth: <?php echo $row['Philhealth']; ?>
    <br>Pag-Ibig: 
    
    
    
    
    
    
    php echo $row['Pag_ibig']; ?>
    <br>Gross Pay: <?php echo $row['Gross_Pay']; ?>
    <br>Net Pay: <?php echo $row['Net_Pay']; ?>
    <br>Total Deduction: <?php echo $row['Total_Deduction']; ?>
    <br>Payroll Date: <?php echo $row['Date_Payroll']; ?>
</p>  


<?php } 
    }
  }
    
?>
      </div> 
    </div>
  </div>
          
              

  

              <form id = "form_new">
            <div class="modal fade" id="modal-add-new">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">New Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value = "insert">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="HR_Name" id="HR_Name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" name="HR_Username"  id="HR_Username" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" class="form-control" name="HR_Password" id="HR_Password" placeholder="Password">
                    </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id = "btnAddNewRecord" value = "Add New Record">
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            </div>
            </form>

            <form id = "form_edit">
          <div class="modal fade edit" id="modal-edit-administrator">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit HR-ADMIN</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="type" id="type" value = "edit">
                  <input type="hidden" name="edit_HR_id" id="edit_HR_id">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="edit_HR_Admin_Name" id="edit_HR_Admin_Name" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="edit_HR_Admin_Username"  id="edit_HR_Admin_Username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="edit_HR_Admin_Password" id="edit_HR_Admin_Password" placeholder="Password">
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" id = "btnEditRecord" value = "Update Record">
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
      </form>


            <script src="../plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
            <!-- Toastr -->
            <script src="../plugins/toastr/toastr.min.js"></script>

            <!-- AdminLTE -->
            <script src="../dist/js/adminlte.js"></script>

            <!-- OPTIONAL SCRIPTS -->
            <script src="../plugins/chart.js/Chart.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="../dist/js/pages/dashboard3.js"></script>

            
            </section>
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


</body>
</html>