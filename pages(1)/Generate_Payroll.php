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
                <h3 class="card-title">Payroll Generation</h3>
                <div class="float-right">
                  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-add-new"><i class="fas fa-user-plus"></i>Generate Payroll</button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>
                    <th width = "5%">Employee ID</th>
                    <th width = "20%">Employee Name</th>
                    <th width = "5%">Tax</th>
                    <th width = "5%">SSS</th>
                    <th width = "5%">Philhealth</th>
                    <th width = "10%">Pag-ibig</th>
                    <th width = "10%">Gross Pay</th>
                    <th width = "10%">Total Deduction</th>
                    <th width = "10%">Net Pay</th>
                    <th width = "20%">Date</th>
                    <th width = "20%"></th>
                  </tr>
                  </thead>
                  <tbody>

                <?php
                require '../connection.php';
                $Employee_id = $_SESSION['employee_ID'];
                $sql = "SELECT tbl_employee_payroll.Payroll_ID, tbl_employee_payroll.Employee_ID, tbl_employee_payroll.Employee_Name, tbl_employee_payroll.Tax,tbl_employee_payroll.SSS,tbl_employee_payroll.Philhealth,tbl_employee_payroll.Pag_ibig, tbl_employee_payroll.Gross_Pay, tbl_employee_payroll.Net_Pay, tbl_employee_payroll.Total_Deduction, tbl_employee_payroll.Date_Payroll, tbl_employees.Employee_JobTitle FROM `tbl_employee_payroll` INNER JOIN tbl_employees ON tbl_employee_payroll.Employee_Name = tbl_employees.employee_name WHERE tbl_employees.managed_id = '$Employee_id'";
                $result = mysqli_query($conn, $sql);

                  ?>  

                  <?php
                  if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) { ?>
                      <tr id = <?php echo $row["Payroll_ID"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td  data-name = "<?php echo $row["Employee_ID"] ?>" ><?php echo $row["Employee_ID"]; ?></td>
                        <td data-Password = "<?php echo $row["Employee_Name"]  ?>"  ><?php echo $row["Employee_Name"]; ?></td>
                        <td data-Username = "<?php echo $row["Tax"] ?>" ><?php echo $row["Tax"]; ?></td>
                        <td  data-name = "<?php echo $row["SSS"] ?>" ><?php echo $row["SSS"]; ?></td>
                        <td data-Password = "<?php echo $row["Philhealth"]  ?>"  ><?php echo $row["Philhealth"]; ?></td>
                        <td data-Username = "<?php echo $row["Pag_ibig"] ?>" ><?php echo $row["Pag_ibig"]; ?></td>
                        <td  data-name = "<?php echo $row["Gross_Pay"] ?>" ><?php echo $row["Gross_Pay"]; ?></td>
                        <td data-Password = "<?php echo $row["Total_Deduction"]  ?>"  ><?php echo $row["Total_Deduction"]; ?></td>
                        <td  data-name = "<?php echo $row["Net_Pay"] ?>" ><?php echo $row["Net_Pay"]; ?></td>
                        <td data-Username = "<?php echo $row["Date_Payroll"] ?>" ><?php echo $row["Date_Payroll"]; ?></td>
                        
                       
                        
                        <td>    
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
                    <h4 class="modal-title">New Salary Grade</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value = "insert">
                    <div class="form-group">
                      <label>Employee ID</label>
                      <select class="form-control" id="Employee_ID" name="Employee_ID">
                     <option value="">Employee ID</option>
                      <?php
                      $select = mysqli_query($conn,"select employee_id from `tbl_employees` WHERE managed_id = '3' ");
                       while($menu1=mysqli_fetch_array($select)) {
                         $filled = $menu1['employee_id'];
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
                      <label>Payroll Date</label>
                      <input type="date" class="form-control" name="Payroll_month" id="Payroll_month" placeholder="">
                    </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id = "btnAddNewRecord" value = "Generate Payroll">
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
                  <h4 class="modal-title">Edit Employee Information</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="type" id="type" value = "edit">
                  <input type="hidden" name="edit_salary_id" id="edit_salary_id">
                  <div class="form-group">
                    <label>Salary Grade</label>
                    <input type="text" class="form-control" name="edit_salary_grade" id="edit_salary_grade" placeholder="Salary Grade">
                  </div>
                  <div class="form-group">
                    <label>Monthly Salary</label>
                    <input type="text" class="form-control" name="edit_Monthly_Salary"  id="edit_Monthly_Salary" placeholder="Monthly Salary">
                  </div>
                  <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" class="form-control" name="edit_Job_title" id="edit_Job_title" placeholder="Job Title">
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
<Script type="text/javascript">
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
        url: 'Process/Process_GeneratePayroll.php',
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
        url: 'Process/Process_Monthly_PayGrade.php',
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

$('#example1 tbody').on('click', '.btn-edit', function () {

document.getElementById("edit_salary_id").value = $(this).closest("tr").attr('id');
document.getElementById("edit_salary_grade").value = $(this).closest("tr").children(":eq(1)").text();
document.getElementById("edit_Job_title").value = $(this).closest("tr").children(":eq(2)").text();
document.getElementById("Montly_Salary").value = $(this).closest("tr").children(":eq(3)").text();

$('#modal-edit-administrator').modal('show');


});

$('#example1 tbody').on('click', '.btn-delete', function () {

var edit_salary_id = $(this).closest("tr").attr('id');
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
          url: 'Process/Process_GeneratePayroll.php',
          data: {type:'delete',edit_salary_id:edit_salary_id},
          success:function(data){

          var response_data = JSON.parse(data);

          if(response_data.icon == 'success')
          {
            $administrator_row.remove();

            Swal.fire(
              'Deleted!',
              'Payroll has been deleted.',
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


</body>
</html>
