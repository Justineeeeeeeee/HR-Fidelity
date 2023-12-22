<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){


  if($_POST['type']=='insert'){
  $Employee_name = $_POST['Employee_name'];
  $Warning_Message = $_POST['Warning_Message'];
  $sql = "SELECT * from tbl_employees where employee_name = '$Employee_name'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $i = 1;
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

  $employee_id = $row['employee_id'];
  $Employee_department = $row['Department'];



  $sql2 = "INSERT INTO `tbl_warning` (Warning_Message,Employee_Name,Employee_ID,Employee_Department )
    VALUES ('$Warning_Message', '$Employee_name', '$employee_id','$Employee_department')";

if($Warning_Message== "" || $Employee_name == "" )
{
  $response = array('title' => 'Warning', 'message' => 'Fields cannot be Empty');
  echo json_encode($response);  
  return;
}
}
}
    if ($conn->query($sql2) === TRUE) {
     

      $response = array('icon' => 'success', 'message' => 'Warning has been successfully created.');
      echo json_encode($response);

    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }

    $conn->close();
   
 
  }

if($_POST['type']=='edit'){

  $Edit_Warning_Id = $_POST['Edit_Warning_Id'];
  $Edit_Warning_Message = $_POST['Edit_Warning_Message'];


  $sql = "UPDATE `tbl_warning` SET `Warning_Message` = '$Edit_Warning_Message' WHERE Warning_ID = '$Edit_Warning_Id'";
  if($Edit_Warning_Id== "" || $Edit_Warning_Message == "" )
{
  $response = array('title' => 'Warning', 'message' => 'Fields can not be Empty');
  echo json_encode($response);
return;
}  
if ($conn->query($sql) === TRUE) {
    $response = array('icon' => 'success', 'message' => 'Warning has been successfully updated.');
    echo json_encode($response);
  } else {
    $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system admin.');
    echo json_encode($response);
  }
  $conn->close();
}



  if($_POST['type']=='delete'){

    $Edit_Warning_Id = $_POST['Edit_Warning_Id'];

    $sql = "DELETE FROM tbl_warning WHERE `Warning_ID` = '$Edit_Warning_Id'";

    //Back-end Validation.
    if($Edit_Warning_Id == "")
    {
      $response = array('icon' => 'warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Warning is now remove.');
      echo json_encode($response);
    } else { 
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }


}


  

?>
