<?php
require ('../../connection.php');

if (isset($_POST['type']) != '')
{

    $EmployeeID = $_POST['Employee_ID'];
    if ($_POST['type'] == 'insert')
    {

        $sql = "SELECT * FROM tbl_employees where employee_id = $EmployeeID ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0)
        {
            $i = 1;
            // output data of each row
            if ($row = mysqli_fetch_assoc($result))
            {

                $Employee_name = $row['employee_name'];
                $Employee_department = $row['Department'];
                $Employee_ID = $row['employee_id'];
                $Gender = $row['Employee_Gender'];

            }

            $sql = "INSERT INTO `tbl_attendance` (Employee_name,Employee_department, Tine_In, Time_out,Date_In , Employee_ID, Gender)
    VALUES ('$Employee_name', '$Employee_department',CURRENT_TIME, '', CURRENT_DATE,$Employee_ID, '$Gender' )";

        }

        if ($Employee_name == "" || $Employee_department == "" || $Employee_ID == "")
        {
            $response = array(
                'title' => 'Warning',
                'message' => 'Fields cannot be Empty'
            );
            echo json_encode($response);
            return;
        }

        if ($conn->query($sql) === true)
        {

            $response = array(
                'icon' => 'success',
                'message' => 'Time in Successfully! has been successfully created.'
            );
            echo json_encode($response);

        }
        else
        {
            $response = array(
                'icon' => 'error',
                'message' => $conn->error . '. Please contact system administrator.'
            );
            echo json_encode($response);
        }
    }

    if ($_POST['type'] == 'out') {
        $sql = "SELECT tbl_employees.employee_id, tbl_employees.employee_name, tbl_employees.Workshift, work_shift.End_Time, tbl_employees.Employee_Gender, tbl_employees.Department FROM tbl_employees INNER JOIN work_shift ON tbl_employees.Workshift=work_shift.Shift_ID WHERE tbl_employees.employee_id = '$EmployeeID'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            if ($row = mysqli_fetch_assoc($result)) {
                $Time_out = $row['End_Time'];
    
                $time_now = date('H:i:s');
    
                if ($time_now < $Time_out) {
                    $response = array(
                        'title' => 'Warning',
                        'message' => 'Invalid Time out!'
                    );
                    echo json_encode($response);
                    return;
                }
            }
        }
    
                $sql = "UPDATE tbl_attendance SET Time_out=CURRENT_TIME WHERE Date_In = CURRENT_DATE";
    
                if ($conn->query($sql) === true) {
                    $response = array(
                        'icon' => 'success',
                        'message' => 'Time out Successfully! Great Job!'
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        'icon' => 'error',
                        'message' => $conn->error . '. Please contact the system administrator.'
                    );
                    echo json_encode($response);
                }
       
    }
     
}

