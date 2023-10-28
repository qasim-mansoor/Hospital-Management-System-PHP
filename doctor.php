<?php
  // Create database connection
  include("connection.php");
  session_start();

if (!isset($_SESSION['sid'])) {
    header("Location: staff.php");
}
$did=$_SESSION['sid'];
$sql = "SELECT * FROM doctor_profile WHERE sid='$did' ";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_array($result)) { 
  $fname=$row['first_name'];
  $lname=$row['last_name'];

  $fname=$row['first_name'];
  $gender=$row['gender'];

  $city=$row['city'];
  $country=$row['country'];

  $dob=$row['birth_date'];
  $age=$row['age'];

  } 
 
?>

<?php include 'doc_nav.php'; ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsiive Admin Dashboard | CodingLab </title>
    <link rel="stylesheet" href="style_patient.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        
        <span class="dashboard"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Doctor Dashboard</span>
      </div>
     
      
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        
        
       
      </div>

      <div class="sales-boxes">
        
        <div class="recent-sales box">
          <div class="title">User Profile</div>
          <div class="sales-details">
            <br><br>
          First Name : &emsp;&emsp;&emsp;  <?php echo $fname ?>
          <br>
          Last Name  : &emsp;&emsp;&emsp;  <?php echo $lname ?>
          <br>
          Gender     : &emsp;&emsp;&emsp;&emsp;&emsp;  <?php echo $gender ?>
          <br>
          Country    : &emsp;&emsp;&emsp;&emsp;  <?php echo $country ?>
          <br>
          City    : &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  <?php echo $city ?>
          <br>
          DOB        : &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  <?php echo $dob ?>
          <br>
          Age        : &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  <?php echo $age ?>
          
        
          </div>
          
        </div>
        
      </div>
    </div>
  </section>

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