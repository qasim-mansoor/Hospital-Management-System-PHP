<?php
  // Create database connection
  include("connection.php");
  session_start();

if (!isset($_SESSION['pid'])) {
    header("Location: index.php");
}
$pid=$_SESSION['pid'];
$sql = "SELECT * FROM patient_profile WHERE pid='$pid' ";
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

  

  $sqlv = "SELECT * FROM appoinments WHERE pid='$pid' ";
  $resultv = mysqli_query($db, $sqlv);
 
?>

<?php include 'patient_nav.php'; ?>
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
        
        <span class="dashboard"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Patient Portal</span>
      </div>
     
      
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        
        
       
      </div>

      <div class="sales-boxes">
        
        <div class="recent-sales box">
          <div class="title">My Appoinments</div>
          <table class="table table-white  table-striped" style="margin-top: 20px;">
        <thead class="thead-dark ">
            <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Speciality</th>
            <th scope="col">Department</th>
            <th scope="col">Approval Status</th>
            
            </tr>
        
        </thead>
        <?php  while($row1 = mysqli_fetch_array($resultv)) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $row1['dfirst_name'] ; ?></td>
                        <td><?php echo $row1['dlast_name'] ; ?></td>
                        <td><?php echo $row1['dspecialist'] ; ?></td>
                        <td><?php echo $row1['ddepartment'] ; ?></td>
                        <td><?php echo $row1['appoinment_status'] ; ?></td>
                        
                
                    </tr>
                </tbody>
                
        <?php  }?>
        
    </table>
          
        </div>

      </div>
    </div>
  </section>

 

</body>
</html>