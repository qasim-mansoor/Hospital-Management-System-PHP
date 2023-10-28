<?php
  // Create database connection
  include("connection.php");
  session_start();
include 'rec_nav.php'; 

if (!isset($_SESSION['sid'])) {
    header("Location: staff.php");}

    $pid=$_SESSION['sid'];
     $sql = "SELECT * FROM nurse_profile where status='free' ";
     $result = mysqli_query($db, $sql);

     
   
?>


<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>  </title>
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
        <i class='fa fa-user-md'></i>
        <span class="dashboard">Available Nurses</span>
      </div>
     
    </nav>

    <div class="home-content">
        <div class="overview-boxes">
        
        <?php while ($row = mysqli_fetch_array($result)) {  ?>
            <div class="box">
              <div class=" col-xl-3 col-lg-4 col-md-6">
                <div class="card">
                    <i class="fa fa-user-md fa-10x" style="margin-left: 20px;"></i>
                        <div class="card-body">
                            <h6 class="card-title font-large-1 mb-0 text-center"><?php echo $row['first_name']," ",$row['last_name'] ?> <?php  ?></h6>
                            <p class="card-text card font-medium-1 text-center mb-0"><?php echo $row['gender']; ?></p>
                            <p class="font-small-3 mb-2 text-center"><?php echo $row['designation']; ?></p>
                            <p class="font-small-3 text-center"><i class="ft-briefcase"></i> <?php echo $row['status'];  ?></p>
                        </div>
							
                        <div class="card-footer mx-auto">
                            <a href="#" class="btn btn-outline-danger btn-sm" id="pop1" did=<?php echo $row['sid'] ; ?>  pid=<?php echo $_SESSION['assign_nurse']; ?>>Assign</a>
                        </div>
                </div>
              </div> 
            </div> 

           <?php } ?>

           </div>
      </div>
          

    </div>
  </section>
  <script src="https://kit.fontawesome.com/8aba30cd89.js" crossorigin="anonymous"></script>
  <script>

   $(document).on("click","#pop1", function() {
  alert("Request For Appoinmnet Submitted ");
     
     var pid=$(this).attr("pid");
     var sid=$(this).attr("did");
	 
     var fdata={'pid':pid,'sid':sid};
        console.log( pid,sid);
        $.ajax
    ({
        url:"receptionist_assign_nurse_help_backend.php",
        method:"POST",
        data:fdata,
        success:function(data){
            
          
           
        }
    })
   
});
 </script>

</body>
</html>
