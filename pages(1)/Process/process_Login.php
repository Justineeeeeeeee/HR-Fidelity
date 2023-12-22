<?php
require '../../connection.php';
if(isset ($_POST['LoginUsername']) && isset( $_POST['LoginPassword'])) {
  $username = $_POST['LoginUsername'];
  $sql2 = "SELECT  * FROM `tbl_employees` WHERE employee_username = '$username'" ;
  $result2 = mysqli_query($conn, $sql2);
  while($row = mysqli_fetch_assoc($result2)) {
  $Employee_Username = $row["employee_username"];
  $Employee_Password = $row["employee_password"];
  $AdminName = $row["employee_name"];
  $status = $row["status"];
  $Employee_ID = $row["employee_id"];
  $Manage_id = $row["managed_id"];
  $Employee_Job_Title= $row['Employee_JobTitle'];
  
  

  if($_POST['LoginUsername'] ===  $Employee_Username  && $_POST['LoginPassword'] ===  $Employee_Password && $status = "1" && $Manage_id <= "1" ){
    session_start();
    $_SESSION['employee_name'] = $AdminName;
    $_SESSION['employee_ID'] =  $Employee_ID;
    $_SESSION['Employee_Job_Title'] = $Employee_Job_Title;  
    $response = array('icon' => 'success', 'message' => 'Login Successfully Welcome Employee');
    echo json_encode($response);
}
  else if ($_POST['LoginUsername'] ===  $Employee_Username  && $_POST['LoginPassword'] ===  $Employee_Password && $status = "1" && $Manage_id > "1"  ){
    session_start();
    $_SESSION['employee_name'] = $AdminName;
    $_SESSION['employee_ID'] =  $Employee_ID;
    $_SESSION['Employee_Job_Title'] = $Employee_Job_Title;
    $response = array('icon' => 'success', 'message' => 'Login Successfully Welcome');
    echo json_encode($response);
}
  else {
    $response = array('icon' => 'error', 'message' => 'Login Failed, Check Credentials!');
    echo json_encode($response);

  }
  
  if ($_POST['LoginUsername'] ===  $Employee_Username  && $_POST['LoginPassword'] ===  $Employee_Password && $status = "1" ) {

   
   }else{
     $response = array('icon' => 'error', 'message' => 'Login Failed, Check Credentials!');
     echo json_encode($response);
   }
  }
  
  $sql3 = "SELECT  * FROM `tbl_superadmin` WHERE 		superadmin_username = '$username'" ;
  $result3 = mysqli_query($conn, $sql3);
  while($row = mysqli_fetch_assoc($result3)) {
  $Super_Admin_Username = $row["superadmin_username"];
  $Super_Admin_Password	 = $row["superadmin_password"];
  $Super_Admin_Name = $row["superadmin_name"];
  $status = $row["status"];
  
  
  if ($_POST['LoginUsername'] ===  $Super_Admin_Username  && $_POST['LoginPassword'] ===  $Super_Admin_Password && $status = "1" ) {
    session_start();
    $_SESSION['superadmin_name'] = $Super_Admin_Name;
    $response = array('icon' => 'success', 'message' => 'Login Successfully Welcome Employee');
    echo json_encode($response);
   
   }else{
     $response = array('icon' => 'error', 'message' => 'Login Failed, Check Credentials!');
     echo json_encode($response);
   }
  }
  
  

  
  }
  ?>