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
    
    </ul>
  </nav>
  <!-- /.navbar -->

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
                <h3 class="card-title">Employee Information</h3>
                <div class="float-right">
                  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-add-new"><i class="fas fa-user-plus"></i> Add Employee</button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>
                    <th width = "20%">Name</th>
                    <th width = "10%">Username</th>
                    <th width = "5%">Status</th>
                    <th width = "40%"></th>

                  </tr>
                  </thead>
                  <tbody>

                <?php
                require '../connection.php';

                $sql = "SELECT * FROM `tbl_employees`";
                $result = mysqli_query($conn, $sql);

                  ?>  

                  <?php
                  if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) { ?>
                      <tr id = <?php echo $row["employee_id"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td  data-name = "<?php echo $row["employee_name"] ?>" ><?php echo $row["employee_name"]; ?></td>
                        <td data-Username = "<?php echo $row["employee_username"] ?>" ><?php echo $row["employee_username"]; ?></td>
                        <td>
                          <?php
                            if($row["status"])
                            {
                              echo '<span class="badge badge-success">Active</span>';
                            }
                            else
                            {
                              echo '<span class="badge badge-danger">Inactive</span>';
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if($row["status"])
                            { ?>
                              <button class="btn btn-primary btn-sm btn-deactivate" style = "width: 100px;"><i class="fas fa-user-slash"></i>Deactivate</button>
                            <?php
                            }
                            else
                            { ?>
                              <button class="btn btn-primary btn-sm btn-activate" style = "width: 100px;"><i class="fas fa-user-check"></i>Activate</button>
                        <?php
                           }
                          ?>
                          <button class="btn btn-info btn-sm btn-edit">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                          </button>
                          <button class="btn btn-danger btn-sm btn-delete">
                              <i class="fas fa-trash"></i>
                              Delete
                          </button>
                        </td>
                      </tr>
                    <?php $i++; }
                  }
                  ?>
              

              <form id = "form_new">
            <div class="modal fade" id="modal-add-new">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">New Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value = "insert">
                  <input type="hidden" name="Employee_ID" id="Employee_ID">
                  <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" class="form-control" name="Employee_Name" id="Employee_Name" placeholder="Employee Name">
                  </div>
                  <div class="form-group">
                    <label>Employee Username</label>
                    <input type="username" class="form-control" name="Employee_Username" id="Employee_Username" placeholder="Employee Username">
                  </div>
                  <div class="form-group">
                    <label>Employee Password</label>
                    <input type="password" class="form-control" name="Employee_Password"  id="Employee_Password" placeholder="Employee Password">
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="Confirm_Password"  id="Confirm_Password" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <label>Department</label>
                    <select class="form-control" id="Employee_Department" name="Employee_Department">
                     <option value="">Department</option>
                      <?php
                      $select = mysqli_query($conn,"select department_name from tbl_department ");
                       while($menu1=mysqli_fetch_array($select)) {
                         $filled = $menu1['department_name'];
                          if (!empty($filled)) {
                         ?>
                          <option value="<?php echo $filled;?>">
                        <?php echo $filled;?>
                      </option>
                       <?php
                      }}
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Work Shift</label>
                    <select class="form-control" id="Employee_WorkShift" name="Employee_WorkShift">
                     <option value="">Work shift</option>
                      <?php
                      $select = mysqli_query($conn,"select Work_shift from work_shift ");
                       while($menu1=mysqli_fetch_array($select)) {
                         $filled = $menu1['Work_shift'];
                          if (!empty($filled)) {
                         ?>
                          <option value="<?php echo $filled;?>">
                        <?php echo $filled;?>
                      </option>
                       <?php
                      }}
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" id="Employee_Gender" name="Employee_Gender">
                     <option value="">Gender</option>
                     <option value="Male">Male</option>
                     <option value="Male">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>SSS ID</label>
                    <input type="number" class="form-control" name="Employee_SSS_ID" id="Employee_SSS_ID" placeholder="SSS ID">
                    <label>Pag-IBIG ID</label>
                    <input type="number" class="form-control" name="Employee_Pag_Ibig_ID" id="Employee_Pag_Ibig_ID" placeholder="Pag-IBIG ID">
                  </div>
                  <div class="form-group">
                    <label>PHILHEALTH ID</label>
                    <input type="number" class="form-control" name="Employee_Philhealth_ID"  id="Employee_Philhealth_ID" placeholder="PHILHEALTH ID">
                  </div>
                  <div class="form-group">
                    <label>Job Title</label>
                    <select class="form-control" id="Job_Title" name="Job_Title">
                     <option value="">Job Title</option>
                      <?php
                      $select = mysqli_query($conn,"select Job_Title from `tbl_job_title` ");
                       while($menu1=mysqli_fetch_array($select)) {
                         $filled = $menu1['Job_Title'];
                          if (!empty($filled)) {
                         ?>
                          <option value="<?php echo $filled;?>">
                        <?php echo $filled;?>
                      </option>
                       <?php
                      }}
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Manager</label>
                    <select class="form-control" id="Employee_Manager" name="Employee_Manager">
                     <option value="">Manager</option>
                      <?php
                      $select = mysqli_query($conn,"select employee_name from tbl_employees Where managed_id > 1");
                       while($menu1=mysqli_fetch_array($select)) {
                         $filled = $menu1['employee_name'];
                          if (!empty($filled)) {
                         ?>
                          <option value="<?php echo $filled;?>">
                        <?php echo $filled;?>
                      </option>
                       <?php
                      }}
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="Employee_Location" id="Employee_Location" placeholder="Location">
                  </div>
                  <div class="form-group">
                  <label>Contact Number</label>
                    <input type="tel" class="form-control" name="Employee_Contact_Number" id="Employee_Contact_Number" placeholder="Contact Number" maxlength = "11" >
                    </div>
                    <div class="form-group">
                    <label>Marital Status</label>
                    <select class="form-control" id="Employee_Marital_Status" name="Employee_Marital_Status">
                     <option value="">Marital Status</option>
                     <option value="Sigle">Sigle</option>
                     <option value="Married">Married</option>
                     <option value="Widowed">Widowed</option>
                     <option value="Divorced">Divorced</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Birthdate</label>
                    <input type="date" class="form-control" name="Employee_Birthdate" id=  "Employee_Birthdate" placeholder="Birthday">
                  </div>
                </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id = "btnAddNewRecord" value = "Add New Employe">
                </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            </div>
            </form>                

            <form id = "form_edit" method = "POST">
          <div class="modal fade edit" id="modal-edit-administrator">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Employee Information</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="type" id="type" value = "edit">
                  <input type="hidden" name="Edit_Employee_ID" id="Edit_Employee_ID">
                  <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" class="form-control" name="Edit_Employee_Name" id="Edit_Employee_Name" placeholder="Employee Name" >
                  </div>
                  <div class="form-group">
                    <label>Employee Username</label>
                    <input type="username" class="form-control" name="Edit_Employee_Username" id="Edit_Employee_Username" placeholder="Employee Username">
                  </div>
                  <div class="form-group">
                    <label>Employee Password</label>
                    <input type="password" class="form-control" name="Edit_Employee_Password"  id="Edit_Employee_Password" placeholder="Employee Password">
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="Edit_Confirm_Password"  id="Edit_Confirm_Password" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <label>Department</label>
                    <select class="form-control" id="Edit_Employee_Department" name="Edit_Employee_Department">
                     <option value="">Department</option>
                      <?php
                      $select = mysqli_query($conn,"select department_name from tbl_department ");
                       while($menu1=mysqli_fetch_array($select)) {
                         $filled = $menu1['department_name'];
                          if (!empty($filled)) {
                         ?>
                          <option value="<?php echo $filled;?>">
                        <?php echo $filled;?>
                      </option>
                       <?php
                      }}
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Work Shift</label>
                    <select class="form-control" id="Edit_Employee_WorkShift" name="Edit_Employee_WorkShift">
                     <option value="">Work shift</option>
                      <?php
                      $select = mysqli_query($conn,"select Work_shift from work_shift ");
                       while($menu1=mysqli_fetch_array($select)) {
                         $filled = $menu1['Work_shift'];
                          if (!empty($filled)) {
                         ?>
                          <option value="<?php echo $filled;?>">
                        <?php echo $filled;?>
                      </option>
                       <?php
                      }}
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" id="Edit_Employee_Gender" name="Edit_Employee_Gender">
                     <option value="">Gender</option>
                     <option value="Male">Male</option>
                     <option value="Male">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>SSS ID</label>
                    <input type="number" class="form-control" name="Edit_Employee_SSS_ID" id="Edit_Employee_SSS_ID" placeholder="SSS ID">
                    <label>Pag-IBIG ID</label>
                    <input type="number" class="form-control" name="Edit_Employee_Pag_Ibig_ID" id="Edit_Employee_Pag_Ibig_ID" placeholder="Pag-IBIG ID">
                  </div>
                  <div class="form-group">
                    <label>PHILHEALTH ID</label>
                    <input type="number" class="form-control" name="Edit_Employee_Philhealth_ID"  id="Edit_Employee_Philhealth_ID" placeholder="PHILHEALTH ID">
                  </div>
                  <div class="form-group">
                    <label>Job Title</label>
                    <select class="form-control" id="Edit_Job_Title" name="Edit_Job_Title">
                     <option value="">Job Title</option>
                      <?php
                      $select = mysqli_query($conn,"select Job_Title from `tbl_job_title` ");
                       while($menu1=mysqli_fetch_array($select)) {
                         $filled = $menu1['Job_Title'];
                          if (!empty($filled)) {
                         ?>
                          <option value="<?php echo $filled;?>">
                        <?php echo $filled;?>
                      </option>
                       <?php
                      }}
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="Edit_Employee_Location" id=  "Edit_Employee_Location" placeholder="Location">
                  </div>
                  <div class="form-group">
                  <label>Contact Number</label>
                    <input type="tel" class="form-control" name="Edit_Employee_Contact_Number" id="Edit_Employee_Contact_Number" placeholder="Contact Number" maxlength = "11" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                    </div>
                    <div class="form-group">
                    <label>Marital Status</label>
                    <select class="form-control" id="Edit_Employee_Marital_Status" name="Edit_Employee_Marital_Status">
                     <option value="">Marital Status</option>
                     <option value="Sigle">Sigle</option>
                     <option value="Married">Married</option>
                     <option value="Widowed">Widowed</option>
                     <option value="Divorced">Divorced</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Birthdate</label>
                    <input type="date" class="form-control" name="Edit_Employee_Birthdate" id=  "Edit_Employee_Birthdate" placeholder="Birthday">
                  </div>
                  <div class="form-group">
                    <label>Job Title</label>
                    <select class="form-control" id="Edit_Employee_Manager" name="Edit_Employee_Manager">
                     <option value="">Manager ID</option>
                      <?php
                      $select = mysqli_query($conn,"select employee_name from `tbl_employees` WHERE managed_id > '1' ");
                       while($menu1=mysqli_fetch_array($select)) {
                         $filled = $menu1['employee_name'];
                          if (!empty($filled)) {
                         ?>
                          <option value="<?php echo $filled;?>">
                        <?php echo $filled;?>
                      </option>
                       <?php
                      }}
                      ?>
                    </select>
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
    <!-- /.content-header -->
    <script type="text/javascript">
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  });
  </script>
<script type="text/javascript">
$(document).ready(function() {
$("#form_new").submit(function(event) {
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
        url: 'Process/Process_ManageEmployee.php',
        data: form.serialize(),
        success:function(data){
          var response_data = JSON.parse(data);
          Toast.fire({
          icon: response_data.icon,
          title: response_data.message
        });
   
        if(response_data.icon == 'success')
        {
          setTimeout(function(){location.reload();},2000);
        }

        }
    });
  });

$("#form_edit").submit(function(event) {
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
        url: 'Process/Process_ManageEmployee.php',
        data: form.serialize(),
        success:function(data){
          var response_data = JSON.parse(data);
          Toast.fire({
          icon: response_data.icon,
          title: response_data.message
        });

        if(response_data.icon == 'success')
        {
          setTimeout(function(){location.reload();},2000);

        }

        }
    });
  } 

);


$('#example1 tbody').on('click', '.btn-activate', function () {

  var Edit_Employee_ID = $(this).closest("tr").attr('id');

  var $status = $(this).closest("tr").children(":eq(4)");
var $actions = $(this).closest("tr").children(":eq(5)");
  Swal.fire({
  title: 'Are you sure?',
  text: "You want to Activate",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Activate it!'
}).then((result) => {
  if (result.isConfirmed) 
  {$.ajax({
        type: "POST",
        cache: false,
        url: 'Process/Process_ManageEmployee.php',
        data: {type:'activate',Edit_Employee_ID:Edit_Employee_ID},
        success:function(data){
          var response_data = JSON.parse(data);

          if(response_data.title == 'Success')
          {
            $status.html('<span class="badge badge-success">Active</span>');
            $actions.html($actions.html().toString().replace('btn-activate','btn-deactivate').replace('fas fa-user-check', 'fas fa-user-slash').replace('Activate', 'Deactivate'));
            Swal.fire(
              'Activated',
              'Employee has been Activated.',
              'success'
            )
          }

        }
      })
    }
    });

});

$('#example1 tbody').on('click', '.btn-deactivate', function () {

var Edit_Employee_ID = $(this).closest("tr").attr('id');

var $status = $(this).closest("tr").children(":eq(4)");
var $actions = $(this).closest("tr").children(":eq(5)");

Swal.fire({
  title: 'Are you sure?',
  text: "You want to Deativate",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Deativate it!'
}).then((result) => {
  if (result.isConfirmed) {


$.ajax({
      type: "POST",
      cache: false,
      url: 'Process/Process_ManageEmployee.php',
      data: {type:'deactivate',Edit_Employee_ID:Edit_Employee_ID},
      success:function(data){
        var response_data = JSON.parse(data);


      if(response_data.title == 'Success')
      {
        $status.html('<span class="badge badge-danger">Inactive</span>');
        $actions.html($actions.html().toString().replace('btn-deactivate','btn-activate').replace('fas fa-user-slash', 'fas fa-user-check').replace('Deactivate', 'Activate'));
        Swal.fire(
              'Deactivated',
              'Employee has been Deactivated.',
              'success'
            )
      }


      }
    })
  }
  });

});


$('#example1 tbody').on('click', '.btn-edit', function () {

document.getElementById("Edit_Employee_ID").value = $(this).closest("tr").attr('id');

$('#modal-edit-administrator').modal('show');


});

$('#example1 tbody').on('click', '.btn-delete', function () {

var Edit_Employee_ID = $(this).closest("tr").attr('id');
var $administrator_row = $(this).closest("tr");

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
          type: "POST",
          cache: false,
          url: 'Process/Process_ManageEmployee.php',
          data: {type:'delete',Edit_Employee_ID:Edit_Employee_ID},
          success:function(data){

          var response_data = JSON.parse(data);

          if(response_data.icon == 'success')
          {
            $administrator_row.remove();

            Swal.fire(
              'Deleted!',
              'Employee has been deleted.',
              'success'
            )
            setTimeout(function(){location.reload();},2000);
          }

          }
      });
  }
})



});
});

</script>

<script>
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>




</body>
</html>
