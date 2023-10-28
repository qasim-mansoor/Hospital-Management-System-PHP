<?php
  // Create database connection
   
  include("connection.php");
  session_start();
  include 'nurse_nav.php';
if (!isset($_SESSION['sid'])) {
    header("Location: staff.php");
}

if (isset($_POST['submit'])) {
	//$username = $_POST['username'];

    $nid=$_SESSION['sid'];
$pid=$_SESSION['assess_patient'];


$sqlq = "SELECT * FROM nurse_assignment WHERE pid='$pid'";
		$resultq = mysqli_query($db, $sqlq);

        while($row1 = mysqli_fetch_array($resultq)) {
            $pfname=$row1['pfirst_name'];
	        $plname=$row1['plast_name'];
          $sid=$row1['sid'];

        }

        $sqv = "SELECT  max(ppass_id) as m_id FROM patient_pre_assessment ";
	$resultv = mysqli_query($db, $sqv);

	while($row = mysqli_fetch_array($resultv)) {
			$m_id=$row['m_id'];
			//echo $m_id;
	}
	$m_id=$m_id+1;

	

	

	$bp=$_POST['bp'];
	$temp=$_POST['temp'];

	$diabetes=$_POST['diabetes'];
    

    $sqv = "INSERT INTO  patient_pre_assessment(ppass_id,sid,pid,n_id,pfirst_name,plast_name,bp,temp,diabetes) VALUES('$m_id','$sid','$pid','$nid','$pfname','$plname','$bp','$temp','$diabetes') ";
	$sqv = mysqli_query($db, $sqv);

    echo "<script> alert('Patient Assessed Successfully!!!')  </script>";
    header("Location: nurse_assess_patient_help.php");
	

	


	
}


 
?>


<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsiive Admin Dashboard | CodingLab </title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/74f8d9aebc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">  
    <link rel="stylesheet" href="style_patiet.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        
        <span class="dashboard"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Patient Portal</span>
      </div>
     
      
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        
        
       
      </div>

      <div class="sales-boxes">
        
        <div class="recent-sales box">
          <div class="title">Assess Patients</div>        
          <div class="container" style="width: 100px;">
		<form action="" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Initials</p>
			
			
            <div class="input-group">
				<input type="text" placeholder="Blood Pressure e.g 120/80" name="bp"  required>
			</div>
            <div class="input-group" style="width: 142px;">
				<input type="text" placeholder="Tempratur e.g 100" name="temp" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Diabetes e.g 210" name="diabetes"  required>
			</div>
			
        
       

						
						<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
		
		</form>
		
</div>
            
          
        </div>

      </div>
    </div>
  </section>

 

</body>
</html>