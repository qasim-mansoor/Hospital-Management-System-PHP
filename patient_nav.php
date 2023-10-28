
<?php 


include 'connection.php';

$pid=$_SESSION['pid'];
$sql = "SELECT first_name,last_name FROM patient_profile WHERE pid='$pid' ";
$result = mysqli_query($db, $sql);
$name="";
while ($row = mysqli_fetch_array($result)) { 
$name=$row['first_name'];
} 

?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsiive Admin Dashboard | CodingLab </title>
    <link rel="stylesheet" href="style_patient.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxs-user'></i>
      <span class="logo_name"><?php echo $name; ?></span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="patient_f1.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="appoinmnet.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Book Appointments</span>
          </a>
        </li>
        <li>
          <a href="patient_requested_appoinment.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">View Appointments</span>
          </a>
        </li>
       
        <li>
          <a href="patient_diagnostics.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">My Diagnostics</span>
          </a>
        </li>

        <li>
          <a href="patient_reports.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">My Reports</span>
          </a>
        </li>
        
        
        
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>
