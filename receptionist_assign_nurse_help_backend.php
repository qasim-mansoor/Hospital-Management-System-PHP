<?php
include("connection.php");


$pid=$_POST['pid'];
$n_id=$_POST['sid'];
echo $n_id;







$sqz = "SELECT  * FROM appoinments where pid='$pid'and appoinment_status='approved' ";
	$sqz = mysqli_query($db, $sqz);

    while($row1=mysqli_fetch_array($sqz))
	{       $doc_id=$row1['sid'];
			$pfname=$row1['pfirst_name'];
            $plname=$row1['plast_name'];
            $dfname=$row1['dfirst_name'];
            $dlname=$row1['dlast_name'];
            $dep=$row1['ddepartment'];
            $spec=$row1['dspecialist'];
			//echo $m_id;
	}
    echo $pfname,$plname,$dfname,$dlname,$dep,$spec;


$sqv = "SELECT  max(ass_id) as m_id FROM nurse_assignment ";
	$sqv = mysqli_query($db, $sqv);

	while($row=mysqli_fetch_array($sqv))
	{
			$m_id=$row['m_id'];
			//echo $m_id;
	}
	$m_id=$m_id+1;
    echo $m_id;

$sql = "INSERT INTO nurse_assignment(ass_id,pid,sid,pfirst_name,plast_name,dfirst_name,dlast_name,ddepartment,dspecialist,n_id) VALUES ('$m_id','$pid','$doc_id','$pfname','$plname','$dfname','$dlname','$dep','$spec','$n_id') ";
$result=mysqli_query($db, $sql);





?>