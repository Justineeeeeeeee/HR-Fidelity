<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $Allowance_Name = $_POST['Allowance_Name'];
    $Amount = $_POST['Amount'];
    $Allowance_code = $_POST['Allowance_code'];

    $sql = "INSERT INTO `tbl_allowance` (Allowance_Name,Amount,Allowance_code)
    VALUES ('$Allowance_Name', '$Amount', '$Allowance_code')";

if($Allowance_Name== "" || $Amount== "" || $Allowance_code == "")
{
  $response = array('title' => 'Warning', 'message' => 'Fields cannot be Empty');
  echo json_encode($response);
  return;
}

    if ($conn->query($sql) === TRUE) {
     

      $response = array('icon' => 'success', 'message' => 'New Allowance has been successfully created.');
      echo json_encode($response);

    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }

    $conn->close();
   
  }

  if($_POST['type']=='edit'){

    $Edit_Allowance_ID = $_POST['Edit_Allowance_ID'];
    $Edit_Allowance_Name = $_POST['Edit_Allowance_Name'];
    $Edit_Amount = $_POST['Edit_Amount'];
    $Edit_Allowance_code = $_POST['Edit_Allowance_code'];
   
    $sql = "UPDATE `tbl_allowance` SET Allowance_Name = '$Edit_Allowance_Name', Amount = '$Edit_Amount', Allowance_code = '$Edit_Allowance_code' WHERE Allowance_ID = '$Edit_Allowance_ID'";
    if($Edit_Allowance_ID== "" || $Edit_Allowance_Name== "" || $Edit_Amount == "" || $Edit_Allowance_code == "")
{
  $response = array('title' => 'Warning', 'message' => 'Fields can not be Empty');
  echo json_encode($response);
  return;
}

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Allowance has been successfully updated.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system admin.');
      echo json_encode($response);
    }
    $conn->close();
  }

  if($_POST['type']=='delete'){

    $Edit_Allowance_ID = $_POST['Edit_Allowance_ID'];

    //Back-end Validation.
    if($Edit_Allowance_ID == "")
    {
      $response = array('icon' => 'warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "DELETE from `tbl_allowance` WHERE Allowance_ID ='$Edit_Allowance_ID'";

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Allowance is now deleted.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }



}

  

?>
