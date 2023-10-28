<?php 

include 'connection.php';


session_start();

error_reporting(0);

$g="";

if (isset($_SESSION['sid'])) {
	
	
	
	
    
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM staff_users WHERE semail='$email' AND spassword='$password'";
	$result = mysqli_query($db, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		//$_SESSION['username'] = $row['username'];
		$_SESSION['sid'] = $row['sid'];
		$_SESSION['pos']=$row['position'];
		$g=$row['position'];
		if($g=="nurse")
	{
		header("Location: nurse.php");
	}
	 if($g=='doctor')
	{
		echo $g;
		header("Location: doctor.php");
	}
	 if($g=="receptionist"){
	header("Location: receptionist.php");}

	if($g=="lab"){
		header("Location: lab.php");}
		
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>
<body style="background-image:url('images/pp.jpg');">
	<div class="container" style="background-color:transparent; box-shadow:none;">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;"> Staff Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Register as Nurse <a href="nurse_registeration.php">Register Here</a>.</p>
			<p class="login-register-text">Register as Doctor <a href="doctor_register.php">Register Here</a>.</p>
			<p class="login-register-text">Register as Receptionist <a href="receptionist_register.php">Register Here</a>.</p>
			<p class="login-register-text">Register as Lab Assisstant <a href="lab_register.php">Register Here</a>.</p>
			
			
		</form>
	</div>
</body>
</html>