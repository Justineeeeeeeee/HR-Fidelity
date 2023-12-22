<?php 
  if(!isset($_SESSION))
  {
      session_start();
      require('connection.php');  
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
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://kit.fontawesome.com/ff86b34ee8.js" crossorigin="anonymous"></script>
  <script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
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
    <img class="animation__shake" src="hr.jpg" alt="AdminLTELogo" height="200" width="200">
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
    <a href="indexEmployee.php" class="brand-link">
      <img src="hr.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HR-Fidelity</span> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="user (3).png" class="img-circle elevation-2" alt="User Image">
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
            <a href="indexEmployee.php" class="nav-link active">
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
                <a href="pages(1)/Employee/ApplyLeave.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Apply Leave</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages(1)/Employee/PublicHoliday.php" class="nav-link">
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
                <a href="pages(1)/Employee/MonthlyAttendance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Attendance Report</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
            <a href="Login.php" class="nav-link in-active">
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

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

    <div class="card card-default color-palette-box">

          <div class="card-header">
            <h3 class="card-title">
            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
             GREETINGS!, KEEP UP THE GOOD WORK!
            </h3>
          </div>


          <div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <form name = "form_new" id = "form_new">
      <h2 class="card-title">TODAY IS</h2>
      <h1>
        <br>
    <div id="clock">
        <?php
        // Server-side PHP to display the initial time
        echo"     " .date('Y-m-d H:i:s');
        ?>
    </div>
    <br>
    </h1>
    <?php $Employee_id = $_SESSION['employee_ID']?> 
        <input type="hidden" name="type" id="type" value = "insert">
        <input type = "Text" id = "Employee_ID" name = "Employee_ID" hidden value = "<?php echo $Employee_id ?>"> </input>
        <Button type="Submit" id="Attendance" name = "Attendance" class="btn btn-primary">Time In</Button>
        </form>
        <br>
        <form name = "form_out" id = "form_out">
      <h2 class="card-title">TIME OUT ON</h2>
      <h1>
        <br>
        <?php 
          $sql = "SELECT tbl_employees.employee_id, tbl_employees.employee_name, tbl_employees.Workshift, work_shift.End_Time from tbl_employees inner JOIN work_shift on tbl_employees.Workshift=work_shift.Work_shift where employee_id = '$Employee_id';" ;
          $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) { 
              $i = 1;
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) { 
                $Time_out = $row['End_Time'];
              }
            }
        ?>
    <div id="clock">
        <?php
        // Server-side PHP to display the initial time
        echo"     "  .date('Y-m-d') . " " . $Time_out;
        ?>
    </div>
    <br>
    </h1>
    
    <?php $Employee_id = $_SESSION['employee_ID']?> 
        <input type="hidden" name="type" id="type" value = "out">
        <input type = "Text" id = "Employee_ID" name = "Employee_ID" hidden value = "<?php echo $Employee_id ?>"> </input>
        <Button type="Submit" id="Attendance" name = "Attendance" class="btn btn-danger">Time Out!</Button>
        </form>
      </div> 
    </div>
  </div>

  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
      <h2 class="card-title">WARNING!</h2>
      <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width = "5%">No.</th>
                    <th width = "10%">Employee Name</th>
                    <th width = "15%">Department</th>
                    <th width = "20%">Warning Message</th>

                  </tr>
                  </thead>
                  <tbody>

                <?php
                $EmployeeName = $_SESSION['employee_name'];
                $sql = "SELECT tbl_employees.employee_id, tbl_employees.employee_name,tbl_employees.Department,tbl_warning.Warning_Message,tbl_warning.Warning_ID from tbl_warning INNER JOIN tbl_employees on tbl_employees.Department=tbl_warning.Employee_Department where tbl_employees.employee_name = '$EmployeeName'";
                $result = mysqli_query($conn, $sql);

                  ?>  

                  <?php
                  if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) { ?>
                      <tr id = <?php echo $row["Warning_ID"]; ?>>
                        <td><?php echo $i; ?></td>
                        <td  data-name = "<?php echo $row["employee_name"] ?>" ><?php echo $row["employee_name"]; ?></td>
                        <td data-Username = "<?php echo $row["Department"] ?>" ><?php echo $row["Department"]; ?></td>
                        <td data-Password = "<?php echo $row["Warning_Message"]  ?>"  ><?php echo $row["Warning_Message"]; ?></td>
                      </tr>
                    <?php $i++; }
                  }
                  ?>
                  </table>

      </div> 
    </div>
  </div>

  

<script>
        // Client-side JavaScript to update the clock every second
        function updateClock() {
            var clockElement = document.getElementById('clock');
            var currentTime = new Date();
            var formattedTime = currentTime.getFullYear() + '-' +
                                ('0' + (currentTime.getMonth() + 1)).slice(-2) + '-' +
                                ('0' + currentTime.getDate()).slice(-2) + ' ' +
                                ('0' + currentTime.getHours()).slice(-2) + ':' +
                                ('0' + currentTime.getMinutes()).slice(-2) + ':' +
                                ('0' + currentTime.getSeconds()).slice(-2);
            
            clockElement.innerHTML = formattedTime;
        }

        // Update the clock every second (1000 milliseconds)
        setInterval(updateClock, 1000);
    </script>


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
        url: 'pages(1)/Process/Process_IndexEmployee.php',
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

$("#form_out").submit(function(event) {
    event.preventDefault(); // prevent submit
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
        url: 'pages(1)/Process/Process_IndexEmployee.php',
        data: form.serialize(),
        success: function(data) {
            var response_data = JSON.parse(data);
            Toast.fire({
                icon: response_data.icon,
                title: response_data.message
            });

            if (response_data.icon === 'success') {
                setTimeout(function() {
                    location.reload();
                }, 2000);
            }
        }
    });
});
});
</script>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
      
          
        </div><!-- /.row -->
      <div class="container-fluid">

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">  
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>

</body>
</html>