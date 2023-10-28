<?php
  // Create database connection
  include("connection.php");
  session_start();

if (!isset($_SESSION['sid'])) {
    header("Location: staff.php");
}
$did=$_SESSION['sid'];


  

  $sqlv = "SELECT distinct(pid),ts_id,pfname,plname,test,result FROM lab_requests natural join test_results where sid='$did' group by sid  ";
  $resultv = mysqli_query($db, $sqlv);

  
 
?>

<?php include 'doc_nav.php'; ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style_patient.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
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
          <div class="title">Test Results</div>
          <table class="table table-white  table-striped" style="margin-top: 20px;">
        <thead class="thead-dark ">
            <tr>
            <th scope="col">Patient ID</th>
            <th scope="col">Patient First Name</th>
            
            <th scope="col">Patient Last Name</th>

            
            
            <th scope="col">Test Name</th>
            <th scope="col">Results</th>

            
            </tr>
        
        </thead>
        <?php  while($row1 = mysqli_fetch_array($resultv)) { ?>
                <tbody>
                    <tr>
                    <td><?php echo $row1['pid'] ; ?></td>
                        <td><?php echo $row1['pfname'] ; ?></td>
                        <td><?php echo $row1['plname'] ; ?></td>
                        <td><?php echo $row1['test'] ; ?></td>
                        <td><?php echo $row1['result'] ?></td>
                      
                
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