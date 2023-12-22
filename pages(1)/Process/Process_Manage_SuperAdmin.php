<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $Super_Admin_Name = $_POST['Super_Admin_Name'];
    $Super_Admin_Username = $_POST['Super_Admin_Username'];
    $Super_Admin_Password = $_POST['Super_Admin_Password'];
    $Confirm_Super_Admin_Password = $_POST['Confirm_Super_Admin_Password'];


    $sql = "INSERT INTO `tbl_superadmin` (superadmin_username,superadmin_password,superadmin_name, Status)
    VALUES ('$Super_Admin_Username', '$Super_Admin_Password', '$Super_Admin_Name', '1')";

if($Super_Admin_Username== "" || $Super_Admin_Password== "" || $Super_Admin_Name == "" || $Confirm_Super_Admin_Password == "")
{
  $response = array('title' => 'Warning', 'message' => 'Fields cannot be Empty');
  echo json_encode($response);
  return;
}else if( $Super_Admin_Password != $Confirm_Super_Admin_Password)
{
  $response = array('title' => 'Warning', 'message' => 'Password Does Not Match!');
  echo json_encode($response);
  return;
}else if ($conn->query($sql) === TRUE) {
     

      $response = array('icon' => 'success', 'message' => 'New Super Admin has been successfully created.');
      echo json_encode($response);

    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }

    $conn->close();
   
  }


  if($_POST['type']=='edit'){

    $edit_superadmin_id = $_POST['edit_superadmin_id'];
    $edit_Super_Admin_Name = $_POST['edit_Super_Admin_Name'];
    $edit_Super_Admin_Username = $_POST['edit_Super_Admin_Username'];
    $edit_Super_Admin_Password = $_POST['edit_Super_Admin_Password'];
    $confirm_edit_Super_Admin_Password = $_POST['confirm_edit_Super_Admin_Password'];
    $sql = "UPDATE tbl_superadmin SET superadmin_name = '$edit_Super_Admin_Name', 	superadmin_username = '$edit_Super_Admin_Username', superadmin_password = '$edit_Super_Admin_Password' WHERE superadmin_id = '$edit_superadmin_id'";
    if($edit_Super_Admin_Name== "" || $edit_Super_Admin_Username== "" || $edit_Super_Admin_Password == "" || $confirm_edit_Super_Admin_Password == "")
  {
  $response = array('title' => 'Warning', 'message' => 'Fields can not be Empty');
  echo json_encode($response);
  return;
  }else if($edit_Super_Admin_Password != $confirm_edit_Super_Admin_Password)
  {
  $response = array('title' => 'Warning', 'message' => 'Password Does not Match');
  echo json_encode($response);
  return;
  }else if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Super Admin has been successfully updated.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system admin.');
      echo json_encode($response);
    }
    $conn->close();
  }


  
  if($_POST['type']=='activate' || $_POST['type']=='deactivate'){

    $edit_superadmin_id = $_POST['edit_superadmin_id'];
    $status = ($_POST['type']=='activate') ? 1 : 0;

    //Back-end Validation.
    if($edit_superadmin_id == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE tbl_superadmin SET status=$status WHERE superadmin_id ='$edit_superadmin_id'";

    if ($conn->query($sql) === TRUE) {
      if($_POST['type']=='activate')
      {
        $response = array('title' => 'Success', 'message' => 'Super Admin is now activated.');
        echo json_encode($response);
      }
      else
      {
        $response = array('title' => 'Success', 'message' => 'Super Admin is now deactivated.');
        echo json_encode($response);
      }
    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }





  if($_POST['type']=='delete'){

    $edit_superadmin_id = $_POST['edit_superadmin_id'];

    //Back-end Validation.
    if($edit_superadmin_id == "")
    {
      $response = array('icon' => 'warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "DELETE from tbl_superadmin WHERE superadmin_id ='$edit_superadmin_id'";

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Super Admin is now deleted.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }



}

  

?>
