<?php 

include 'connection.php';

error_reporting(0);

session_start();

if (isset($_SESSION['sid'])) {
    header("Location: staff.php");
}



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
    $spec_e=$_POST['specialization'];

    $dep_e=$_POST['department'];
	$cnic=$_POST['cnic'];

	$desg="doctor";

	


	if ($password == $cpassword) {
		$sql = "SELECT * FROM staff_users WHERE semail='$email'";
		$result = mysqli_query($db, $sql);

		
		
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO staff_users (sid, semail, spassword,position)
					VALUES ('$cnic', '$email', '$password','$desg')";
			$result = mysqli_query($db, $sql);
			

			$profile = "INSERT INTO doctor_profile (sid,first_name,last_name,gender,city,country,birth_date,age,specialization,department,designation) VALUES('$cnic','$fname_e','$lname_e','$gender_e','$city_e','$country_e','$dob_e','$age_e',' $spec_e',' $dep_e','$desg')";
			$result = mysqli_query($db, $profile);

		
			if ( $profile) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				header("Location: staff.php");
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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/74f8d9aebc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">    
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - Pure Coding</title>
</head>

</style>
<body style="background-image:url('images/pp.jpg')">
	<div class="container" style="width: 1000px; background-color:transparent; box-shadow:none">
		<form action="" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>

            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
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
				<input type="text" placeholder="CNIC" name="cnic" required>
			</div>

			<div class="input-group">
				<input type="text" placeholder="City" name="city" required>
            </div>

            <div class="input-group">
				<input type="text" placeholder="Country" name="country"  required>
			</div>

            <div class="input-group">
				<input type="date" placeholder="Date Of Birth" name="dob" required>
			</div>

			<div class="input-group">
				<input type="text" placeholder="Age" name="age"  required>
			</div>

			
			

            <div class="input-group">
				<input type="text" placeholder="Specialization" name="specialization"  required>
			</div>

            <div class="input-group">
				<input type="text" placeholder="Department" name="department"  required>
			</div>
        
       

						
						<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="staff.php">Login Here</a>.</p>
		</form>
		
</div>
</div>
	</div>
	

</body>
</html>