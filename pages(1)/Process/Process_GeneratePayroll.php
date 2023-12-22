<?php

require('../../connection.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='insert'){

    $Employee_ID = $_POST['Employee_ID'];
    $Payroll_month = $_POST['Payroll_month'];


                $sql = "SELECT tbl_employees.employee_id, tbl_employees.employee_name, tbl_job_title.salary_amount FROM `tbl_employees` INNER JOIN tbl_job_title ON tbl_employees.Employee_JobTitle = tbl_job_title.Job_Title WHERE employee_id = '$Employee_ID'";
                $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $Employee_name = $row['employee_name'];
                        $Salary = $row['salary_amount'];
                        $tax = ($Salary*.15); 
                        $SSS = ($Salary*.045);
                        $SSS = $SSS - ($SSS*.50); 
                        $Philhealth = (($Salary*.045));
                        $Philhealth = $Philhealth - (($Philhealth*.50)); 
                        $pagibig = 200;
                        $Total_deduction = ( $SSS + $Philhealth + $SSS);
                        $Netpay =  $Salary - $Total_deduction;


    $sql2 = "INSERT INTO `tbl_employee_payroll` (Employee_ID,Employee_Name,Tax,SSS,Philhealth,Pag_ibig,total_deduction,Gross_Pay,Net_Pay,Date_Payroll)
    VALUES ('$Employee_ID', '$Employee_name', '$tax', '$SSS','$Philhealth','$pagibig','$Total_deduction','$Salary','$Netpay ','$Payroll_month')";
    }
} 

if($Employee_ID== "" || $Payroll_month == "")      
{
  $response = array('title' => 'Warning', 'message' => 'Fields cannot be Empty');
  echo json_encode($response);
  return;
}

    if ($conn->query($sql2) === TRUE) {
     

      $response = array('icon' => 'success', 'message' => 'Payroll has been successfully Generated.');
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

    $sql = "DELETE from `tbl_employee_payroll` WHERE Payroll_ID ='$edit_salary_id'";

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
