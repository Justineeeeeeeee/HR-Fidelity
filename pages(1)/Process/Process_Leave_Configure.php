<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){

  
if($_POST['type']=='activate' || $_POST['type']=='deactivate'){

  $Edit_Leave_ID = $_POST['Edit_Leave_ID'];
  $Employee_name = $_POST['Employee_name'];
  $status = ($_POST['type']=='activate') ? 1 : 0;

  //Back-end Validation.
  if($Edit_Leave_ID == "")
  {
    $response = array('title' => 'Warning', 'message' => 'Data is invalid');
    echo json_encode($response);
    return;
  }
  $sql = "SELECT * FROM `employee_leave` where leave_ID = $Edit_Leave_ID ";
  $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
      if ($row = mysqli_fetch_assoc($result)) {
        $Leave_type = $row['Leave_Type'];

        if ($Leave_type === "Sick Leave" ){
          $sql =  "UPDATE employee_leave SET Leave_Status = '$status' WHERE Leave_ID = '$Edit_Leave_ID';";
          $sql2 = "UPDATE `tbl_employees` SET tbl_employees.Employee_SL = tbl_employees.Employee_SL - 1 where tbl_employees.employee_name = '$Employee_name';";
        } else if ($Leave_type === "Vacation Leave" ){
          $sql = "UPDATE employee_leave SET Leave_Status = '$status' WHERE Leave_ID = '$Edit_Leave_ID';";
          $sql2 = "UPDATE `tbl_employees` SET tbl_employees.Employee_VL = tbl_employees.Employee_VL - 1 where tbl_employees.employee_name = '$Employee_name';";
        }else if ($Leave_type === "Business Leave" ){
          $sql = "UPDATE employee_leave SET Leave_Status = '$status' WHERE Leave_ID = '$Edit_Leave_ID'";
          $sql2 = "UPDATE `tbl_employees` SET tbl_employees.Employee_BL = tbl_employees.Employee_BL - 1 where tbl_employees.employee_name = '$Employee_name';";
        }
  if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
    if($_POST['type']=='activate')
    {
      $response = array('title' => 'Success', 'message' => 'Leave is now approved.');
      echo json_encode($response);
    }
    else
    {
      $response = array('title' => 'Success', 'message' => 'Leave is now Rejected.');
      echo json_encode($response);
    }
  } else {
    $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    echo json_encode($response);
  }
  $conn->close();
}
    }

}


if($_POST['type']=='delete'){

  $Edit_Leave_ID = $_POST['Edit_Leave_ID'];
  $Employee_name = $_POST['Employee_name'];

  //Back-end Validation.
  if($Edit_Leave_ID == "")
  {
    $response = array('icon' => 'warning', 'message' => 'Data is invalid');
    echo json_encode($response);
    return;
  }


  $sql = "SELECT * FROM `employee_leave` where leave_ID = $Edit_Leave_ID ";
  $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
      if ($row = mysqli_fetch_assoc($result)) {
        $Leave_type = $row['Leave_Type'];

        if ($Leave_type === "Sick Leave" ){
          $sql =  "DELETE from employee_leave WHERE Leave_ID ='$Edit_Leave_ID'";
          $sql2 = "UPDATE `tbl_employees` SET tbl_employees.Employee_SL = tbl_employees.Employee_SL + 1 where tbl_employees.employee_name = '$Employee_name';";
        } else if ($Leave_type === "Vacation Leave" ){
          $sql = "DELETE from employee_leave WHERE Leave_ID ='$Edit_Leave_ID'";
          $sql2 = "UPDATE `tbl_employees` SET tbl_employees.Employee_VL = tbl_employees.Employee_VL + 1 where tbl_employees.employee_name = '$Employee_name';";
        }else if ($Leave_type === "Business Leave" ){
          "DELETE from employee_leave WHERE Leave_ID ='$Edit_Leave_ID'";
          $sql2 = "UPDATE `tbl_employees` SET tbl_employees.Employee_BL = tbl_employees.Employee_BL + 1 where tbl_employees.employee_name = '$Employee_name';";
        }

  if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
    $response = array('icon' => 'success', 'message' => 'Leave is now deleted.');
    echo json_encode($response);
  } else {
    $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
    echo json_encode($response);
  }
  $conn->close();
}
    }

}



}

  

?>
