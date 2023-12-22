<?php



require '../../../connection.php';
$month = $_POST['Month'];
$sql = "SELECT * FROM `tbl_attendance` where Date_In BETWEEN $month ";
$result = mysqli_query($conn, $sql);

  ?>  

  <?php
  if (mysqli_num_rows($result) > 0) {
    $i = 1;
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { ?>
      <tr id = <?php echo $row["Attendance_ID"]; ?>>
        <td><?php echo $i; ?></td>
        <td data-Password = "<?php echo $row["Employee_ID"]  ?>"  ><?php echo $row["Employee_ID"]; ?></td>
        <td  data-name = "<?php echo $row["Employee_Name"] ?>" ><?php echo $row["Employee_Name"]; ?></td>
        <td data-Username = "<?php echo $row["Employee_Department"] ?>" ><?php echo $row["Employee_Department"]; ?></td>
        <td data-Password = "<?php echo $row["Tine_In"]  ?>"  ><?php echo $row["Tine_In"]; ?></td>
        <td  data-name = "<?php echo $row["Time_out"] ?>" ><?php echo $row["Time_out"]; ?></td>
        <td data-Username = "<?php echo $row["Date_In"] ?>" ><?php echo $row["Date_In"]; ?></td>
      </tr>
    <?php $i++; }
  }
  ?>
 