<?php
  // Create database connection
  include("connection.php");
  session_start();
include 'patient_nav.php'; 

if (!isset($_SESSION['pid'])) {
    header("Location: index.php");}

    $pid=$_SESSION['pid'];
     $sql = "SELECT * FROM doctor_profile ";
     $result = mysqli_query($db, $sql);

     $sqlv = "SELECT * FROM patient_profile where pid='$pid' ";
     $resultv = mysqli_query($db, $sqlv);

     if ($resultv->num_rows > 0) {
      $rowv = mysqli_fetch_assoc($resultv);
      //$_SESSION['username'] = $row['username'];
      $_SESSION['first_name'] = $rowv['first_name'];
      $_SESSION['last_name'] = $rowv['last_name'];
      
     }
   
?>


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
        <i class='fa fa-user-md'></i>
        <span class="dashboard">Available Doctors</span>
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
                            <h6 class="card-title font-large-1 mb-0 text-center"><?php echo $row['first_name'],$row['last_name'] ?> <?php  ?></h6>
                            <p class="card-text card font-medium-1 text-center mb-0"><?php echo $row['specialization']; ?></p>
                            <p class="font-small-3 mb-2 text-center"><?php echo $row['country']; ?></p>
                            <p class="font-small-3 text-center"><i class="ft-briefcase"></i> <?php echo $row['department'];  ?></p>
                        </div>
                        <div class="card-footer mx-auto">
                            <a href="#" class="btn btn-outline-danger btn-sm" id="pop1" pid=<?php echo  $_SESSION['pid']; ?> pfname=<?php echo $_SESSION['first_name']; ?> plname=<?php echo $_SESSION['last_name']; ?>  did=<?php echo $row['sid']; ?> dfname=<?php echo  $row['first_name']; ?> dlname=<?php  echo $row['last_name']; ?> ddep=<?php  echo $row['department']; ?> dspec=<?php  echo $row['specialization']; ?>>Book Appointment</a>
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
     var did=$(this).attr("did");
     var pfname=$(this).attr("pfname");
     var dfname=$(this).attr("dfname");
     var dlname=$(this).attr("dlname");
     var plname=$(this).attr("plname");
     var ddep=$(this).attr("ddep");
     var dspec=$(this).attr("dspec");
    //  var cr=$(this).attr("cr");
    //  var roll_no=$(this).attr("roll_no");
     var fdata={'pid':pid,'did':did,'pfname':pfname,'plname':plname,'dfname':dfname,'dlname':dlname,'ddep':ddep,'dspec':dspec};
        console.log(pid , did, dfname,dlname,pfname,plname,ddep,dspec);
        $.ajax
    ({
        url:"appoinmnet_backend.php",
        method:"POST",
        data:fdata,
        success:function(data){
            
          
           
        }
    })
   
});
 </script>

</body>
</html>
