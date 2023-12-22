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

$employee_id = $_SESSION['employee_ID'];

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
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="https://kit.fontawesome.com/ff86b34ee8.js" crossorigin="anonymous"></script>
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
   
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="indexHR.php" class="brand-link">
      <img src="../hr.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HR-Fidelity</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../user (3).png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="Myinformation.php" class="d-block"><?php echo $_SESSION["employee_name"] ?>
        <p class = "font-weight-light" style="font-size: 15px"  ><?php echo $_SESSION["Employee_Job_Title"] ?></p></a>
          
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
            <a href="indexHR.php" class="nav-link">
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
                <a href="ManageEmployee.php" class="nav-link ">
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
                <a href="DailyAttendance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Attendance</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="MontlyAttendance.php" class="nav-link">
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
                <a href="Allowance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Allowance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="MonthlyPayGrade.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Job Title</p>
                </a>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

    <section class="content">
      <div class="container-fluid" >
        <div class="row">
          <div class="col-12" >
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Attendance Information</h3>
                <div class="float-right">
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th width = "5%">No.</th>
                    <th width = "10%">Employee ID</th>
                    <th width = "20%">Employee Name</th>
                    <th width = "10%">Department</th>
                    <th width = "10%">Time In</th>
                    <th width = "10%">Time out</th>
                    <th width = "10%">Date in</th>
                    <th width = "10%">Gender</th>

                  </tr>
                  </thead>
                  <tbody>

                <?php
                require '../connection.php';

                $sql = "SELECT tbl_attendance.Attendance_ID,tbl_attendance.Employee_name,tbl_attendance.Employee_department,tbl_attendance.Tine_In,tbl_attendance.Time_out,tbl_attendance.Date_In,tbl_attendance.Employee_ID,tbl_attendance.Gender,tbl_employees.managed_id FROM tbl_attendance Inner JOIN tbl_employees ON tbl_attendance.Employee_ID = tbl_employees.employee_id WHERE managed_id = '$employee_id'";
                $result = mysqli_query($conn, $sql);

                  ?>  

                  <?php
                  if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    // output data of each row
                    if($row = mysqli_fetch_assoc($result)) { ?>
                        <tr id = <?php echo $row["Attendance_ID"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td data-Warning = "<?php echo $row["Employee_ID"]  ?>"><?php echo $row["Employee_ID"]; ?></td>
                        <td  data-name = "<?php echo $row["Employee_name"] ?>" ><?php echo $row["Employee_name"]; ?></td>
                        <td data-Username = "<?php echo $row["Employee_department"] ?>" ><?php echo $row["Employee_department"]; ?></td>
                        <td data-Password = "<?php echo $row["Tine_In"]  ?>"  ><?php echo $row["Tine_In"]; ?></td>
                        <td data-Warning = "<?php echo $row["Time_out"]  ?>"  ><?php echo $row["Time_out"]; ?></td>
                        <td data-Warning = "<?php echo $row["Date_In"]  ?>"  ><?php echo $row["Date_In"]; ?></td>
                        <td data-Warning = "<?php echo $row["Gender"]  ?>"  ><?php echo $row["Gender"]; ?></td>
                      </tr>
                    <?php $i++; }
                  }
                  ?>
              
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
    <!-- /.content-header -->


</body>
</html>
