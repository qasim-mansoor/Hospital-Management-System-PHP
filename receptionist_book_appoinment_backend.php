<?php
include("connection.php");


$did=$_POST['did'];


$cnic=$_POST['cnic'];
$dfname=$_POST['dfname'];
$dlname=$_POST['dlname'];

$ddep=$_POST['ddep'];
$dspec=$_POST['dspec'];
$done_by="receptionist";

echo $did,$cnic,$dfname,$dlname,$ddep,$dspec,$done_by;


$sqz = "SELECT  * FROM patient_profile ";
	$sqz = mysqli_query($db, $sqz);

    while($row1=mysqli_fetch_array($sqz))
	{
			$pfname=$row1['first_name'];
            $plname=$row1['last_name'];
			//echo $m_id;
	}
    echo $pfname,$plname;


$sqv = "SELECT  max(ap_id) as m_id FROM appoinments ";
	$sqv = mysqli_query($db, $sqv);

	while($row=mysqli_fetch_array($sqv))
	{
			$m_id=$row['m_id'];
			//echo $m_id;
	}
	$m_id=$m_id+1;

$sql = "INSERT INTO appoinments(ap_id,pid,sid,pfirst_name,plast_name,dfirst_name,dlast_name,ddepartment,dspecialist,appoinment_status,booked_by) VALUES ('$m_id','$cnic','$did','$pfname','$plname','$dfname','$dlname','$ddep','$dspec','pending','$done_by') ";
$result=mysqli_query($db, $sql);





?>