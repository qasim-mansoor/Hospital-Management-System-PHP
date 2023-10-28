<?php
  // Create database connection
   
  include("connection.php");
  session_start();
  include 'rec_nav.php';
if (!isset($_SESSION['sid'])) {
    header("Location: staff.php");
}
$did=$_SESSION['sid'];
if (isset($_POST['submit'])) {
	//$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	$fname_e=$_POST['fname'];
	$lname_e=$_POST['lname'];

	$gender_e=$_POST['gender'];
	$city_e=$_POST['city'];

	$country_e=$_POST['country'];
	$dob_e=$_POST['dob'];

	$age_e=$_POST['age'];
    $cnic=$_POST['cnic'];

	


	if ($password == $cpassword) {
		$sql = "SELECT * FROM patient_users WHERE pemail='$email'";
		$result = mysqli_query($db, $sql);

		
		
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO patient_users (pid, pemail, ppassword)
					VALUES ('$cnic', '$email', '$password')";
			$result = mysqli_query($db, $sql);
			

			$profile = "INSERT INTO patient_profile (pid,first_name,last_name,gender,city,country,birth_date,age) VALUES('$cnic','$fname_e','$lname_e','$gender_e','$city_e','$country_e','$dob_e','$age_e')";
			$result = mysqli_query($db, $profile);

		
			if ( $profile) {
				echo "<script>alert('Patient Registration Completed.')</script>";
				
			} else {
				echo "<script>alert(' Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
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
        
        <span class="dashboard"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Patient Portal</span>
      </div>
     
      
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        
        
       
      </div>

      <div class="sales-boxes">
        
        <div class="recent-sales box">
          <div class="title">Register Patients</div>        
          <div class="container" style="width: 100px;">
		<form action="" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="" required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="First Name" name="fname"  required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Last Name" name="lname"  required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Gender M/F" name="gender" required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="Cnic" name="cnic" required>
            </div>
			<div class="input-group">
				<input type="text" placeholder="City" name="city" required>
            </div>
            <div class="input-group">
				<input type="text" placeholder="Country" name="country"  required>
			</div>
            <div class="input-group" style="width: 142px;">
				<input type="date" placeholder="Date Of Birth" name="dob" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Age" name="age"  required>
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