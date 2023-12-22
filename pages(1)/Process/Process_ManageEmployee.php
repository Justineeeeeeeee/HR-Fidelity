<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $Employee_Name = $_POST['Employee_Name'];
    $Employee_Password = $_POST['Employee_Password'];
    $Employee_confirm_Password = $_POST['Confirm_Password'];
    $Employee_Username = $_POST['Employee_Username'];
    $Employee_Department = $_POST['Employee_Department'];
    $Employee_WorkShift = $_POST['Employee_WorkShift'];
    $Employee_Gender = $_POST['Employee_Gender'];
    $Employee_SSS_ID = $_POST['Employee_SSS_ID'];
    $Employee_Philhealth_ID = $_POST['Employee_Philhealth_ID'];
    $Employee_Pag_Ibig_ID = $_POST['Employee_Philhealth_ID'];
    $Employee_Job_title = $_POST['Job_Title'];
    $Employee_Location = $_POST['Employee_Location'];
    $Employee_Contact_Number = $_POST['Employee_Contact_Number'];
    $Employee_Marital_Status = $_POST['Employee_Marital_Status'];
    $Employee_Birthdate =  $_POST['Employee_Birthdate'];
    $Employee_Manager = $_POST['Employee_Manager'];

  
    $sql2 = "SELECT * FROM `tbl_employees` where employee_name = '$Employee_Manager' ";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { 
        $managed_id = $row['employee_id'];
        

  
if($Employee_Username== "" || $Employee_Password== "" || $Employee_Name == "" || $Employee_Department ==  " " || $Employee_WorkShift == "" || $Employee_Gender== "" || $Employee_SSS_ID == "" || $Employee_Pag_Ibig_ID ==  " " || $Employee_Job_title== "" || $Employee_Location == "" || $Employee_Contact_Number ==  ""|| $Employee_Marital_Status ==  "" )
{
  $response = array('title' => 'Warning', 'message' => 'Fields cannot be Empty');
  echo json_encode($response);

}if($Employee_confirm_Password != $Employee_Password  )
{
  $response = array('title' => 'Warning', 'message' => 'Password Does Not Match');
  echo json_encode($response);
}
$p_hash =  password_hash($Employee_Password,  PASSWORD_DEFAULT); 
$sql = "INSERT INTO `tbl_employees` (`employee_username`, `employee_password`, `employee_name`, `status`, `Warning`, `Department`, `Workshift`, `Employee_Gender`, `Employee_VL`, `Employee_SL`, `Employee_BL`, `Employee_Tax`, `Employee_SSS`, `Employee_Pagibig`, `Employee_Philhealth`, `Employee_JobTitle`, `Employee_Location`, `Employee_ContactNumber`, `Employee_MartitalStatus`, `Employee_birthday`,`managed_id`)
VALUES ('$Employee_Username','$Employee_Password','$Employee_Name','1','1','$Employee_Department','$Employee_WorkShift',' $Employee_Gender','10','10','10','','$Employee_SSS_ID','$Employee_Pag_Ibig_ID','$Employee_Philhealth_ID','$Employee_Job_title ','$Employee_Location ','$Employee_Contact_Number','$Employee_Marital_Status ','$Employee_Birthdate','$managed_id')";

 
if ($conn->query($sql) === TRUE) {
     

      $response = array('icon' => 'success', 'message' => 'New Employee has been successfully created.');
      echo json_encode($response);

    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
}
    }
        
}

  if($_POST['type']=='edit'){

    $Edit_Employee_ID = $_POST['Edit_Employee_ID'];
    $Edit_Employee_Name = $_POST['Edit_Employee_Name'];
    $Edit_Employee_Username = $_POST['Edit_Employee_Username'];
    $Edit_Employee_Password = $_POST['Edit_Employee_Password'];

  
  $p_hash =  password_hash($Edit_Employee_Password,  PASSWORD_DEFAULT); 
$sql = "UPDATE tbl_employees SET employee_name = '$Edit_Employee_Name', 	employee_username = '$Edit_Employee_Username', employee_password = '$Edit_Employee_Password' WHERE employee_id = '$Edit_Employee_ID'";

if($Edit_Employee_Name== "" || $Edit_Employee_Username== "" || $Edit_Employee_Password == "")
{
  $response = array('title' => 'Warning', 'message' => 'Fields can not be Empty');
  echo json_encode($response);
  return;
}
    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Employee has been successfully updated.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system admin.');
      echo json_encode($response);
    }
    $conn->close();
  }


  
  if($_POST['type']=='activate' || $_POST['type']=='deactivate'){

    $Edit_Employee_ID = $_POST['Edit_Employee_ID'];
    $status = ($_POST['type']=='activate') ? 1 : 0;

    //Back-end Validation.
    if($Edit_Employee_ID == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE tbl_employees SET status=$status WHERE employee_id ='$Edit_Employee_ID'";

    if ($conn->query($sql) === TRUE) {
      if($_POST['type']=='activate')
      {
        $response = array('title' => 'Success', 'message' => 'Employee is now activated.');
        echo json_encode($response);
      }
      else
      {
        $response = array('title' => 'Success', 'message' => 'Employee is now deactivated.');
        echo json_encode($response);
      }
    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }





  if($_POST['type']=='delete'){

    $Edit_Employee_ID = $_POST['Edit_Employee_ID'];

    //Back-end Validation.
    if($Edit_Employee_ID == "")
    {
      $response = array('icon' => 'warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "DELETE from tbl_employees WHERE employee_id ='$Edit_Employee_ID'";

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Employee is now deleted.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }



}

?>
