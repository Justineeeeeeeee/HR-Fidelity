<?php 
  if(!isset($_SESSION))
  {
      session_start();
  }

  if($_SESSION['employee_name'] == "" && $_SESSION['employee_ID'] = "")
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
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
    <img class="animation__shake" src="../../hr.jpg" alt="AdminLTELogo" height="200" width="200">
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../indexEmployee.php" class="brand-link">
      <img src="../../hr.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HR-Fidelity</span> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../user (3).png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="Pages(1)/Myinformation.php" class="d-block"><?php echo $_SESSION["employee_name"] ?>
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
            <a href="../../indexEmployee.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
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
                <a href="ApplyLeave.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Apply Leave</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="PublicHoliday.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Public Holiday</p>
                </a>
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
                <a href="MonthlyAttendance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Attendance Report</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
            <a href="../../Login.php" class="nav-link in-active">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
              <p>
              Log-Out
              </p>
            </a>
          </li>
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
    <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
      <h2 class="card-title">Available Leave Credits</h2>
     
      <table id="example1" class="table table-bordered table-striped">
      <br>
      <br>
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>
                    <th width = "20%">Employee Name</th>
                    <th width = "15%">Department</th>
                    <th width = "20%">Vacation Leave</th>
                    <th width = "20%">Sick Leave</th>
                    <th width = "20%">Bussiness Leave</th>

                  </tr>
                  </thead>
                  <tbody>

                <?php
                 require '../../connection.php';
                $EmployeeName = $_SESSION['employee_name'];
                $sql = "SELECT * from tbl_employees where employee_name = '$EmployeeName'";
                $result = mysqli_query($conn, $sql);

                  ?>  

                  <?php
                  if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <td><?php echo $i; ?></td>
                        <td  data-name = "<?php echo $row["employee_name"] ?>" ><?php echo $row["employee_name"]; ?></td>
                        <td data-Username = "<?php echo $row["Department"] ?>" ><?php echo $row["Department"]; ?></td>
                        <td data-Password = "<?php echo $row["Employee_VL"]  ?>"  ><?php echo $row["Employee_VL"]; ?></td>
                        <td data-Username = "<?php echo $row["Employee_SL"] ?>" ><?php echo $row["Employee_SL"]; ?></td>
                        <td data-Password = "<?php echo $row["Employee_BL"]  ?>"  ><?php echo $row["Employee_BL"]; ?></td>
                      </tr>
                    <?php $i++; }
                  }
                  ?>
                  </table>

      </div> 
    </div>
  </div>
      <section class="content">
      <div class="container-fluid" >
        <div class="row">
          <div class="col-12" >
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Apply Leave</h3>
                <div class="float-right">
                  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-add-new"><i class="fas fa-user-plus"></i>Apply Leave</button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>

                    <th width = "20%">Name</th>
                    <th width = "15%">Leave Type</th>
                    <th width = "15%">Leave Date</th>
                    <th width = "5%">Status</th>
                    <th width = "40%"></th>

                  </tr>
                  </thead>
                  <tbody>

                <?php
                
                $employee = $_SESSION["employee_name"];
                $sql = "SELECT tbl_employees.employee_id, employee_leave.Leave_ID, tbl_employees.employee_name,employee_Leave.Leave_Date,employee_leave.Leave_Status,employee_leave.Leave_Type from employee_leave inner JOIN tbl_employees on tbl_employees.employee_name=employee_leave.Employee_Name Where tbl_employees.employee_name = '$employee' ";
                $result = mysqli_query($conn, $sql);

                  ?>  
                  <?php
                  if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) { ?>
                      <tr id = <?php echo $row["Leave_ID"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td data-Username = "<?php echo $row["employee_name"] ?>" ><?php echo $row["employee_name"]; ?></td>
                        <td data-Username = "<?php echo $row["Leave_Type"] ?>" ><?php echo $row["Leave_Type"]; ?></td>
                        <td data-Password = "<?php echo $row["Leave_Date"]  ?>"  ><?php echo $row["Leave_Date"]; ?></td>
                        <td>
                          <?php
                            if($row["Leave_Status"])
                            {
                              echo '<span class="badge badge-success">Approved</span>';
                            }
                            else
                            {
                              echo '<span class="badge badge-danger">Pending</span>';
                            }
                          ?>
                        </td>
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

              <form id = "form_new"  name = "form_new">
            <div class="modal fade" id="modal-add-new">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Apply Leave</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value = "insert">
                    <div class="form-group">
                      <label>Employee Name</label>
                      <input type="text" class="form-control" value = "<?php echo $employee ?>" name= "Employee_Name" id="Employee_Name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label>Leave Type</label>
                      <select class="form-control" id="Employee_Leave_Type" name="Employee_Leave_Type">
                     <option value="">Leave Type</option>
                     <option value="Vacation Leave">Vacation Leave</option>
                     <option value="Sick Leave">Sick Leave</option>
                     <option value="Business Leave">Business Leave</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label>Leave Date</label>
                      <input type="date" class="form-control" name="Leave_Date"  id="Leave_Date" placeholder="Leave Date">
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
                  <input type="hidden" name="edit_Leave_ID" id="edit_Leave_ID">
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


            <script src="../../plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
            <!-- Toastr -->
            <script src="../../plugins/toastr/toastr.min.js"></script>

            <!-- AdminLTE -->
            <script src="../../dist/js/adminlte.js"></script>

            <!-- OPTIONAL SCRIPTS -->
            <script src="../../plugins/chart.js/Chart.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="../../dist/js/pages/dashboard3.js"></script>

            
            </section>

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
        url: 'Process_Employee/Process_Leave.php',
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

$('#example1 tbody').on('click', '.btn-delete', function () {

var edit_Leave_ID = $(this).closest("tr").attr('id');
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
          url: 'Process_Employee/Process_Leave.php',
          data: {type:'delete',edit_Leave_ID:edit_Leave_ID},
          success:function(data){

          var response_data = JSON.parse(data);

          if(response_data.icon == 'success')
          {
            $administrator_row.remove();

            Swal.fire(
              'Deleted!',
              'Leave has been deleted.',
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





      </div><!-- /.container-fluid -->
    <!-- /.content-header -->
  </div>
<!-- REQUIRED SCRIPTS -->

</body>
</html>
