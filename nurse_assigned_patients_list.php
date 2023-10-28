<?php
  // Create database connection
  include("connection.php");
  session_start();

if (!isset($_SESSION['sid'])) {
    header("Location: staff.php");
}
$did=$_SESSION['sid'];


  ;

  $sqlv = "SELECT * FROM nurse_assignment where n_id='$did'  ";
  $resultv = mysqli_query($db, $sqlv);
 
?>

<?php include 'nurse_nav.php'; ?>
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
        
        <span class="dashboard"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nurse Dashboard</span>
      </div>
     
      
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        
        
       
      </div>

      <div class="sales-boxes">
        
        <div class="recent-sales box">
          <div class="title">Assigned Patients</div>
          <table class="table table-white  table-striped" style="margin-top: 20px;">
        <thead class="thead-dark ">
            <tr>
            <th scope="col">Patient Name</th>
            
            <th scope="col">Doctor  Name</th>
            
            <th scope="col">Speciality</th>
            <th scope="col">Department</th>
            
            
            
            </tr>
        
        </thead>
        <?php  while($row1 = mysqli_fetch_array($resultv)) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $row1['pfirst_name'] ;echo " "; echo $row1['plast_name'] ; ?></td>
                        
                        <td><?php echo $row1['dfirst_name'] ; echo " "; echo $row1['dlast_name'] ; ?></td>
                        
                        <td><?php echo $row1['dspecialist'] ; ?></td>
                        <td><?php echo $row1['ddepartment'] ; ?></td>
                        
                       
                        
                
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