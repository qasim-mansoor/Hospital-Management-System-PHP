<?php
include("connection.php");


$ap_id=$_POST['ap_id'];



echo $ap_id;


$sqz = "UPDATE appoinments set appoinment_status='approved' where ap_id=$ap_id ";
	$sqz = mysqli_query($db, $sqz);

  
 





?>