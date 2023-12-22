<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $Holiday_Name = $_POST['Holiday_Name'];
    $Holiday_Date = $_POST['Holiday_Date'];
    $Holiday_Type = $_POST['Holiday_Type'];
  
    


    $sql = "INSERT INTO `tbl_Holiday` (Holiday_Name,Holiday_Date, Holiday_Type)
    VALUES ('$Holiday_Name', '$Holiday_Date','$Holiday_Type')";

if($Holiday_Name== "" || $Holiday_Date== "" || $Holiday_Type == "" )
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

    $Edit_Holiday_ID = $_POST['Edit_Holiday_ID'];
    $Edit_Holiday_Name = $_POST['Edit_Holiday_Name'];
    $Edit_Holiday_Date = $_POST['Edit_Holiday_Date'];
    $Edit_Holiday_Type = $_POST['Edit_Holiday_Type'];
    
  

    $sql = "UPDATE tbl_holiday SET Holiday_Name = '$Edit_Holiday_Name', Holiday_Date = '$Edit_Holiday_Date', Holiday_Type = '$Edit_Holiday_Type'  WHERE Holiday_ID = '$Edit_Holiday_ID'";
    if($Edit_Holiday_Name== "" || $Edit_Holiday_Date== "" || $Edit_Holiday_Type == "")
{
  $response = array('title' => 'Warning', 'message' => 'Fields can not be Empty');
  echo json_encode($response);
  return;
}

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Holiday has been successfully updated.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system admin.');
      echo json_encode($response);
    }
    $conn->close();
  }


  if($_POST['type']=='delete'){

    $Edit_Holiday_ID = $_POST['Edit_Holiday_ID'];

    //Back-end Validation.
    if($Edit_Holiday_ID == "")
    {
      $response = array('icon' => 'warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "DELETE from tbl_holiday WHERE Holiday_ID ='$Edit_Holiday_ID'";

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Holiday is now deleted.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }



}

  

?>
