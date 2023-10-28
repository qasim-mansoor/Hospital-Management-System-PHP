<?php
include("connection.php");

$pid=$_POST['pid'];
$did=$_POST['did'];

$pfname=$_POST['pfname'];
$plname=$_POST['plname'];

$dfname=$_POST['dfname'];
$dlname=$_POST['dlname'];

$ddep=$_POST['ddep'];
$dspec=$_POST['dspec'];

$done_by="patient";
echo $pid,$did,$pfname,$plname,$dfname,$dlname,$ddep,$dspec;
$no=1;


$sqv = "SELECT  max(ap_id) as m_id FROM appoinments ";
	$sqv = mysqli_query($db, $sqv);

	while($row=mysqli_fetch_array($sqv))
	{
			$m_id=$row['m_id'];
			//echo $m_id;
	}
	$m_id=$m_id+1;

$sql = "INSERT INTO appoinments(ap_id,pid,sid,pfirst_name,plast_name,dfirst_name,dlast_name,ddepartment,dspecialist,appoinment_status,booked_by) VALUES ('$m_id','$pid','$did','$pfname','$plname','$dfname','$dlname','$ddep','$dspec','pending','$done_by') ";
$result=mysqli_query($db, $sql);





?>