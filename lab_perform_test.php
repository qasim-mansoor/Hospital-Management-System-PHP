<?php
  // Create database connection
   
  include("connection.php");
  session_start();
  
if (!isset($_SESSION['sid'])) {
    header("Location: staff.php");
}
include 'lab_nav.php';
$did=$_SESSION['sid'];
if (isset($_POST['submit'])) 
{
	
    $pid=$_POST['pid'];

    $_SESSION['perform']=$pid;

	

    echo"<ecript>conslode.log($pid,$did)  </script>";
	
		$sql = "SELECT * FROM lab_requests WHERE pid='$pid' and status='pending'";
		$result = mysqli_query($db, $sql);

        $r=mysqli_fetch_array($result);
        $sid=$r['sid'];
        $_SESSION['doc']=$sid;

    

		
		
		if ($result->num_rows > 0) {
            header("Location: lab_perform_test_help.php");
			
		} else {
			echo "<script>alert('Woops! Test For This Patient ID Has not Requested:)')</script>";
		}
		
} 




 
?>


<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>  </title>
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
        
        <span class="dashboard"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Lab Assistant Dashboard</span>
      </div>
     
      
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        
        
       
      </div>

      <div class="sales-boxes">
        
        <div class="recent-sales box">
          <div class="title">Lab Test</div>        
          <div class="container" style="width: 100px;">
		<form action="" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 1rem; font-weight: 800;">Patient ID</p>
			
			
			<div class="input-group">
				<input type="text" placeholder="Patient ID" name="pid"  required>
			</div>
			
        
       

						
			<div class="input-group">
				<button name="submit" class="btn">Action</button>
			</div>
		
		</form>
		
</div>
            
          
        </div>

      </div>
    </div>
  </section>

 

</body>
</html>