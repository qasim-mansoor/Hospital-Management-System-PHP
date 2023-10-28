<?php
  // Create database connection
   
  include("connection.php");
  session_start();

  
  
if (!isset($_SESSION['sid'])) {
    header("Location: staff.php");
}

include 'lab_nav.php';



if (isset($_POST['submit'])) {
	//$username = $_POST['username'];

    
    $final=$_POST['disease'];
    
    $sid=$_SESSION['sid'];
    $pid=$_SESSION['perform'];
    $did=$_SESSION['doc'];

   

    









    

        $sqll = "SELECT  max(ts_id) as m_id FROM test_results ";
	    $resultv = mysqli_query($db, $sqll);

        while($row = mysqli_fetch_array($resultv)) {
                $m_id=$row['m_id'];
                
        }
        $m_id=$m_id+1;

 
        echo "<script> console.log($m_id,$sid,$pid,$did) </script>";
        
        $sqv = "INSERT INTO  test_results(ts_id,assisstant_id,pid,sid,result) VALUES('$m_id','$sid','$pid','$did','$final') ";
        $sqv = mysqli_query($db, $sqv);
	
}


 
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title></title>
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
          <div class="title">Result</div> 
          
          <div class="container" style="width: 100px;">
		<form action="" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Perform Test</p>
			
			
            <div class="input-group">
				<input type="text" placeholder="Disease" name="disease"  required>
			</div>
          	
        
       

						
						<div class="input-group">
				<button name="submit" class="btn">Submit</button>
			</div>
		
		</form>
		
</div>
          
        


          
            
          
        </div>

      </div>
    </div>
  </section>

 

</body>
</html>