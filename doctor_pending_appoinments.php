<?php
  // Create database connection
  include("connection.php");
  session_start();

if (!isset($_SESSION['sid'])) {
    header("Location: staff.php");
}
$did=$_SESSION['sid'];


  ;

  $sqlv = "SELECT * FROM appoinments where sid='$did' and appoinment_status='pending'  ";
  $resultv = mysqli_query($db, $sqlv);
 
?>

<?php include 'doc_nav.php'; ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsiive Admin Dashboard | CodingLab </title>
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
        
        <span class="dashboard"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Patient Portal</span>
      </div>
     
      
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        
        
       
      </div>

      <div class="sales-boxes">
        
        <div class="recent-sales box">
          <div class="title">Pending Appoinments</div>
          <table class="table table-white  table-striped" style="margin-top: 20px;">
        <thead class="thead-dark ">
            <tr>
            <th scope="col">Patient ID</th>
            <th scope="col">Patient First Name</th>
            
            <th scope="col">Patient Last Name</th>
            
            <th scope="col">Approval Status</th>
            <th scope="col">Approve Appoinment</th>

            
            </tr>
        
        </thead>
        <?php  while($row1 = mysqli_fetch_array($resultv)) { ?>
                <tbody>
                    <tr>
                    <td><?php echo $row1['pid'] ; ?></td>
                        <td><?php echo $row1['pfirst_name'] ; ?></td>
                        <td><?php echo $row1['plast_name'] ; ?></td>
                      
                       
                        <td><?php echo $row1['appoinment_status'] ; ?></td>
                        <td><div class="card-footer mx-auto">
                            <a href="#" class="btn btn-outline-danger btn-sm" id="pop1"  ap_id=<?php echo $row1['ap_id']; ?> style="margin-left: 25px;">Approve</a>
                        </div></td>
                
                    </tr>
                </tbody>
                
        <?php  }?>
        
    </table>
          
        </div>

      </div>
    </div>
  </section>
  <script>
      $(document).on("click","#pop1", function() {
        alert("Appoinment Approved");
     var ap_id=$(this).attr("ap_id");
     
     var fdata={'ap_id':ap_id};
        console.log(ap_id);
        $.ajax
    ({
        url:"doctor_pending_appoinments_backend.php",
        method:"POST",
        data:fdata,
        success:function(data){
            
            
        }
    })
   
});
   



  </script>

 

</body>
</html>