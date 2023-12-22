<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $hr_Username = $_POST['HR_Username'];
    $hr_Password = $_POST['HR_Password'];
    $hr_Name = $_POST['HR_Name'];
    $hr_Confirm_Password = $_POST['HR_confirm_password'];


    $sql = "INSERT INTO `hr-admins` (HR_Username, HR_Password,HR_Name, Status)
    VALUES ('$hr_Username', '$hr_Password', '$hr_Name', '1')";

if($hr_Username== "" || $hr_Password== "" || $hr_Name == "" || $hr_Confirm_Password == ""  )
{
  $response = array('title' => 'Warning', 'message' => 'Fields cannot be Empty');
  echo json_encode($response);
  return;
}else if($hr_Confirm_Password != $hr_Password){
  $response = array('title' => 'Warning', 'message' => 'Password Does Not Match!');
  echo json_encode($response);
}else if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'New HR has been successfully created.');
      echo json_encode($response);

    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }

    $conn->close();
   
  }

  if($_POST['type']=='edit'){

    $edit_HR_id = $_POST['edit_HR_id'];
    $edit_HR_Admin_Name = $_POST['edit_HR_Admin_Name'];
    $edit_HR_Admin_Username = $_POST['edit_HR_Admin_Username'];
    $edit_HR_Admin_Password = $_POST['edit_HR_Admin_Password'];
    $edit_HR_confirm_password = $_POST['edit_HR_confirm_password'];

    $sql = "UPDATE `hr-admins` SET HR_Name = '$edit_HR_Admin_Name', 	HR_Username = '$edit_HR_Admin_Username', HR_Password = '$edit_HR_Admin_Password' WHERE HR_ID = '$edit_HR_id'";
    if($edit_HR_Admin_Name== "" || $edit_HR_Admin_Username== "" || $edit_HR_Admin_Password == "" && $edit_HR_confirm_password == "")
  {
    $response = array('title' => 'Warning', 'message' => 'Fields can not be Empty');
    echo json_encode($response);
  return;
  }else if($edit_HR_confirm_password != $edit_HR_Admin_Password){
    $response = array('title' => 'Warning', 'message' => 'Password Does Not Match!');
    echo json_encode($response);
  }else if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'HR has been successfully updated.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system admin.');
      echo json_encode($response);
    }
    $conn->close();
  }

  if($_POST['type']=='activate' || $_POST['type']=='deactivate'){

    $edit_HR_id = $_POST['edit_HR_id'];
    $status = ($_POST['type']=='activate') ? 1 : 0;

    //Back-end Validation.
    if($edit_HR_id == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE `hr-admins` SET Status=$status WHERE 	HR_ID ='$edit_HR_id'";

    if ($conn->query($sql) === TRUE) {
      if($_POST['type']=='activate')
      {
        $response = array('title' => 'Success', 'message' => 'HR is now activated.');
        echo json_encode($response);
      }
      else
      {
        $response = array('title' => 'Success', 'message' => 'HR is now deactivated.');
        echo json_encode($response);
      }
    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }





  if($_POST['type']=='delete'){

    $edit_HR_id = $_POST['edit_HR_id'];

    //Back-end Validation.
    if($edit_HR_id == "")
    {
      $response = array('icon' => 'warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "DELETE from `hr-admins` WHERE HR_ID ='$edit_HR_id'";

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'HR is now deleted.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }



}

  

?>
