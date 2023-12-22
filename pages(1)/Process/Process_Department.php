<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $Department_Name = $_POST['Department_Name'];
    $Department_Code = $_POST['Department_Code'];
  
    


    $sql = "INSERT INTO `tbl_department` (department_name,Department_Code, Status)
    VALUES ('$Department_Name', '$Department_Code','1')";

if($Department_Name== "" || $Department_Code== "" )
{
  $response = array('title' => 'Warning', 'message' => 'Fields cannot be Empty');
  echo json_encode($response);
  return;
}

    if ($conn->query($sql) === TRUE) {
     

      $response = array('icon' => 'success', 'message' => 'New Department has been successfully created.');
      echo json_encode($response);

    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }

    $conn->close();
   
  }


  if($_POST['type']=='edit'){

    $Edit_Department_ID = $_POST['Edit_Department_ID'];
    $Edit_Department_Name = $_POST['Edit_Department_Name'];
    $Edit_Department_Code = $_POST['Edit_Department_Code'];
  

    $sql = "UPDATE tbl_department SET department_name = '$Edit_Department_Name', 	Department_Code = '$Edit_Department_Code'  WHERE Department_id = '$Edit_Department_ID'";
    if($Edit_Department_Name== "" || $Edit_Department_Code== "")
{
  $response = array('title' => 'Warning', 'message' => 'Fields can not be Empty');
  echo json_encode($response);
  return;
}

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Super Admin has been successfully updated.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system admin.');
      echo json_encode($response);
    }
    $conn->close();
  }


  
  if($_POST['type']=='activate' || $_POST['type']=='deactivate'){

    $Edit_Department_ID = $_POST['Edit_Department_ID'];
    $status = ($_POST['type']=='activate') ? 1 : 0;

    //Back-end Validation.
    if($Edit_Department_ID == "")
    {
      $response = array('icon' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "UPDATE tbl_department SET status=$status WHERE Department_id ='$Edit_Department_ID'";

    if ($conn->query($sql) === TRUE) {
      if($_POST['type']=='activate')
      {
        $response = array('title' => 'Success', 'message' => 'Department is now activated.');
        echo json_encode($response);
      }
      else
      {
        $response = array('title' => 'Success', 'message' => 'Department is now deactivated.');
        echo json_encode($response);
      }
    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }





  if($_POST['type']=='delete'){

    $Edit_Department_ID = $_POST['Edit_Department_ID'];

    //Back-end Validation.
    if($Edit_Department_ID == "")
    {
      $response = array('icon' => 'warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "DELETE from tbl_department WHERE Department_id ='$Edit_Department_ID'";

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Department is now deleted.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }



}

  

?>
