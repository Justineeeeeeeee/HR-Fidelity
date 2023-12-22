<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $Salary_Grade = $_POST['Salary_Grade'];
    $Montly_Salary = $_POST['Montly_Salary'];
    $Job_title = $_POST['Job_title'];

    $sql = "INSERT INTO `tbl_job_title` (Salary_Grade,salary_amount,Job_Title)
    VALUES ('$Salary_Grade', '$Montly_Salary', '$Job_title')";

if($Salary_Grade== "" || $Montly_Salary== "" || $Job_title == "")
{
  $response = array('title' => 'Warning', 'message' => 'Fields cannot be Empty');
  echo json_encode($response);
  return;
}

    if ($conn->query($sql) === TRUE) {
     

      $response = array('icon' => 'success', 'message' => 'New Salary Grade has been successfully created.');
      echo json_encode($response);

    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }

    $conn->close();
   
  }

  if($_POST['type']=='edit'){

    $dit_salary_id = $_POST['edit_salary_id'];
    $edit_salary_grade = $_POST['edit_salary_grade'];
    $edit_Monthly_Salary = $_POST['edit_Monthly_Salary'];
    $edit_Job_title = $_POST['edit_Job_title'];
   
    $sql = "UPDATE `tbl_job_title` SET Salary_Grade = '$edit_salary_grade', salary_amount = '$edit_Monthly_Salary', Job_Title = '$edit_Job_title' WHERE Job_Title_ID = '$dit_salary_id'";
 
    if($dit_salary_id== "" || $edit_salary_grade== "" || $edit_Monthly_Salary == "" || $edit_Job_title == "")
{
  $response = array('title' => 'Warning', 'message' => 'Fields can not be Empty');
  echo json_encode($response);
  return;
}

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Salary Grade has been successfully updated.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system admin.');
      echo json_encode($response);
    }
    $conn->close();
  }

  if($_POST['type']=='delete'){

    $edit_salary_id = $_POST['edit_salary_id'];

    //Back-end Validation.
    if($edit_salary_id == "")
    {
      $response = array('icon' => 'warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "tbl_job_title from `tbl_salarygrade` WHERE Job_Title_ID ='$edit_salary_id'";

    if ($conn->query($sql) === TRUE) {
      $response = array('icon' => 'success', 'message' => 'Salary Grade is now deleted.');
      echo json_encode($response);
    } else {
      $response = array('icon' => 'error', 'message' => $conn->error . '. Please contact system administrator.');
      echo json_encode($response);
    }
    $conn->close();
  }



}

  

?>
