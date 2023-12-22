<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $Work_Shift = $_POST['Work_Shift'];
    $Start_Time = $_POST['Start_Time'];
    $End_Time = $_POST['End_Time'];
    $Department_code = $_POST['Department_code'];


    $sql = "INSERT INTO `Work_shift` (Work_shift,Start_Time,End_Time,Department_code)
    VALUES ('$Work_Shift', '$Start_Time', '$End_Time','$Department_code')";

if($Work_Shift== "" || $Start_Time== "" || $End_Time == "" || $Department_code == "" )
{
  $response = array('title' => 'Warning', 'message' => 'Fields cannot be Empty');
  echo json_encode($response);
  return;
}

    if ($conn->query($sql) === TRUE) {
     

      $response = array('icon' => 'success', 'message' => 'New Work Shift has been successfully created.');
      echo json_encode($response);

    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }

    $conn->close();
   
  }

  if($_POST['type']=='edit'){

    $edit_Shift_ID = $_POST['edit_Shift_ID'];
    $edit_Work_Shift = $_POST['edit_Work_Shift'];
    $edit_Start_Time = $_POST['edit_Start_Time'];
    $edit_End_Time = $_POST['edit_End_Time'];
    $edit_Department_code = $_POST['edit_Department_code'];
    

    $sql = "UPDATE `Work_shift` SET Work_shift = '$edit_Work_Shift', 	Start_Time = '$edit_Start_Time', End_Time = '$edit_End_Time' , Department_code = '$edit_Department_code' WHERE Shift_ID = '$edit_Shift_ID'";
    if($edit_Shift_ID== "" || $edit_Work_Shift== "" || $edit_Start_Time == "" || $edit_End_Time == "" || $edit_Department_code = "")
{
  $response = array('title' => 'Warning', 'message' => 'Fields can not be Empty');
  echo json_encode($response);
  return;
}

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Work Shift has been successfully updated.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system admin.');
      echo json_encode($response);
    }
    $conn->close();
  }

  if($_POST['type']=='delete'){

    $edit_Shift_ID = $_POST['edit_Shift_ID'];

    //Back-end Validation.
    if($edit_Shift_ID == "")
    {
      $response = array('icon' => 'warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "DELETE from `Work_shift` WHERE Shift_ID ='$edit_Shift_ID'";

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
