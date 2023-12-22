<?php

require('../../../connection.php');

if(isset($_POST['type']) != ''){
 

  if($_POST['type']=='insert'){
    $Employee_Name = $_POST['Employee_Name'];
    $Employee_Leave_Type = $_POST['Employee_Leave_Type'];
    $Leave_Date = $_POST['Leave_Date'];


    $sql = "SELECT * FROM `tbl_employees`";
    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_assoc($result)) {

    $Sick_Leave = $row['Employee_SL'];
    $Vacation_Leave = $row['Employee_VL'];
    $Business_Leave = $row['Employee_BL'];

    if($Employee_Name== "" || $Employee_Leave_Type== "" || $Leave_Date == "")
    {
    $response = array('title' => 'Warning', 'message' => 'Fields cannot be Empty');
    echo json_encode($response);
  }
   
  
  if($Employee_Leave_Type === "Sick Leave"){
    $sql = "INSERT INTO `employee_leave` ('Employee_Name','Leave_Date','Leave_Type')
      VALUES ('$Employee_Name', '$Leave_Date', '$Employee_Leave_Type')";

if ($conn->query($sql) === TRUE) {
  $response = array('icon' => 'success', 'message' => 'Leave Application has been successfully Sent.');
  echo json_encode($response);
}

  }
  if($Employee_Leave_Type === "Bussiness Leave"){
    $sql = "INSERT INTO `employee_leave` ('Employee_Name','Leave_Date','Leave_Type')
    VALUES ('$Employee_Name', '$Leave_Date', '$Employee_Leave_Type')";

if ($conn->query($sql) === TRUE) {
  $response = array('icon' => 'success', 'message' => 'Leave Application has been successfully Sent.');
  echo json_encode($response);
}
  }
  if ($Employee_Leave_Type === "Vacation Leave"){
    $sql = "INSERT INTO `employee_leave` (Employee_Name,Leave_Date,Leave_Type)
    VALUES ('$Employee_Name', '$Leave_Date','$Employee_Leave_Type')";

if ($conn->query($sql) === TRUE) {
  $response = array('icon' => 'success', 'message' => 'Leave Application has been successfully Sent.');
  echo json_encode($response);
}
  } 

 


    }
}
  


 
  if($_POST['type']=='delete'){

    $edit_Leave_ID = $_POST['edit_Leave_ID'];

    //Back-end Validation.  
    if($edit_Leave_ID == "")
    {
      $response = array('icon' => 'warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "DELETE from employee_leave WHERE Leave_ID ='$edit_Leave_ID'";

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Leave is now deleted.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }

}



  

?>
