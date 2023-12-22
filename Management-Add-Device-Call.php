

<?php 
include('Connect.php');


if($_SESSION['Acc_ID']!="")
{
	$Acc_ID = $_SESSION['Acc_ID'];
}

$result_ACC=mysqli_query($conn, "SELECT * FROM Account_tb WHERE Acc_ID='$Acc_ID'")or die('Error In Session');
$ACC_Result=mysqli_fetch_array($result_ACC);
$Acc_Name = $ACC_Result['Acc_Name'];
$Acc_Status = $ACC_Result['Acc_Status'];





if(isset($_POST['Project_IDX']))
{
  $_SESSION['Project_IDX'] = $_POST['Project_IDX'];
  
}
$Project_ID = $_SESSION['Project_IDX'];
$result_Pro=mysqli_query($conn, "SELECT * FROM `Call-Project_tb` WHERE Project_ID='$Project_ID'")or die('Error In Session');
$Pro_Result=mysqli_fetch_array($result_Pro);
$Project_Name = $Pro_Result['Project_Name'];
$Project_No = $Pro_Result['Project_No'];


if(isset($_POST['Save']))
{
  $Project_IDZ = $_POST['Project_IDZ'];
  $Brand_ID = $_POST['Brand_ID'];
  $Type_ID = $_POST['Type_ID'];
  $Dev_Model = $_POST['Device_Model'];
  $Dev_Type = $_POST['Device_Type'];

      $Check_ID = "Select * From `Call-Device_tb` ORDER BY Dev_ID DESC LIMIT 1";
      $result_Check_ID =mysqli_query($conn,$Check_ID);
      $row_Check_ID =mysqli_fetch_array($result_Check_ID);
      $Last_id = $row_Check_ID['Dev_ID'];
      $Rest = substr($Last_id, -3);
      $Insert_id = $Rest + 1;
      $ars = sprintf("%03d", $Insert_id);
      $ref = "Dev-";
      $Dev_ID = $ref.''.$ars;


        $SQL_AddDev ="INSERT INTO `Call-Device_tb` (`Dev_ID`,`Brand_ID`,`Type_ID`,`Dev_Model`, `Dev_Type`, `Project_ID`) VALUES ('$Dev_ID', '$Brand_ID','$Type_ID','$Dev_Model','$Dev_Type','$Project_IDZ')";
        if ($conn->query($SQL_AddDev)==TRUE)
          {
            echo "
            <script src='https://code.jquery.com/jquery-3.6.4.js'></script>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                  $(document).ready(function(){
                    Swal.fire({
                      title:'Add Device Complete!',
                      icon: 'success',
                      timer: 5000,
                      showConfirmButton: false
                    });
                  });
                  </script>";
                
                  header("refresh:2; url=Management-Call-Screen.php");

          }
  
  
}

if(isset($_POST['TypeDelete']))
{
  $Type_ID= $_POST['Type_ID'];

  $SQL_Type = "DELETE FROM Type_tb WHERE Type_ID ='$Type_ID';";
          if ($conn->query($SQL_Type)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Add-Device.php";';
            echo '</script>';
          }
}



// <image src="image/Logo.png" width="250px" ></image>

?>


<!DOCTYPE html>
<html>
<head>
<title>Inventory Store SVOA</title>
<link rel="icon" type="image/png" href="image/icon.png"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"> </script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"> </script>
		<style>

<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
.pull-left {
				float: left;
			}
			.pull-right {
				float: right;
			}


     
</style>
</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<?php include('Navbar/Navbar-Head.php') ?>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <hr>
         <p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i><?php echo $Acc_Name ?> </p>
         <p><i class="fa fa-address-book fa-fw w3-margin-right w3-text-theme"></i> <?php echo $Acc_Status ?></p>
         <!-- <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p> -->
        </div>
      </div>
      <br>
      
           <!-- Accordion -->
           <?php include('Navbar/Project-call-Bar.php'); ?>

      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p><?php echo $Acc_Namex; ?></p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding" align="center">
            <img src="image/Logo.png" style="width:50%">

            </div>
          </div>
        </div>
      </div>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
          <h4 align="center">เพิ่มอุปกรณ์โครงการ</h4>
          <form action="Management-Add-Device-Call.php" method="POST">
                <p>ชื่อโครงการ
                <input type="text" class="form-control" Disabled id="Project_Name" name="Project_Name" value="<?php echo $Project_Name ?>"></p>
                <p>เลขที่สัญญา
                <input type="text" class="form-control" Disabled id="Project_No" name="Project_No" value="<?php echo $Project_No ?>">

                <hr>

                <p>ยี่ห้ออุปกรณ์
                    <select name="Brand_ID" class="form-control">
                    <option value="">Select Brand</option>
                    <?php 
                    $query ="SELECT Brand_ID, Brand_Name FROM Brand_tb";
                    $result = $conn->query($query);
                    if($result->num_rows> 0){
                        while($OptionBrand=$result->fetch_assoc()){
                        $Brand_Name =$OptionBrand['Brand_Name'];
                        $Brand_ID =$OptionBrand['Brand_ID'];
                    ?>
                    <option value="<?php echo $Brand_ID; ?>" ><?php echo $Brand_Name; ?> </option>
                    <?php
                    }}
                    ?>
                  </select></p>

                  <p>ประเภทอุปกรณ์
                    <select name="Type_ID" class="form-control">
                    <option value="">Select Type</option>
                    <?php 
                    $query ="SELECT Type_ID, Type_Name FROM Type_tb";
                    $result = $conn->query($query);
                    if($result->num_rows> 0){
                        while($OptionType=$result->fetch_assoc()){
                        $Type_Name =$OptionType['Type_Name'];
                        $Type_ID =$OptionType['Type_ID'];
                    ?>
                    <option value="<?php echo $Type_ID; ?>" ><?php echo $Type_Name; ?> </option>
                    <?php
                    }}
                    ?>
                  </select></p>

                  <p>รุ่นอุปกรณ์
                <input type="text" class="form-control" placeholder="รุ่นอุปกรณ์" id="Device_Model" name="Device_Model" value=""></p>

                <p>ข้อมูล Serial-Number<br>
                    <input type="radio" name="Device_Type" value="None">  ไม่ระบุ Serial-Number<br>
                    <input type="radio" name="Device_Type"  value="Fix">  ระบุ Serial-Number
                  </p>

                  <hr>

                  <input type="text" class="form-control" hidden  name="Project_IDZ" value="<?php echo $Project_ID ?>">
                  <button type="Submit" class="btn btn-success btn-block" name="Save"><i class="fa fa-pencil"></i> Save</button>

                  <br>
            </form>




      

      </div>
                

                
              <!-- End Middle Column -->
              </div>
              
              <!-- Right Column -->
              <?php include('Navbar/Right-Bar.php'); ?>
              
            <!-- End Grid -->
            </div>
            
          <!-- End Page Container -->
          </div>
          <br>

       
          
          <script>
          // Accordion
          function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
              x.className += " w3-show";
              x.previousElementSibling.className += " w3-theme-d1";
            } else { 
              x.className = x.className.replace("w3-show", "");
              x.previousElementSibling.className = 
              x.previousElementSibling.className.replace(" w3-theme-d1", "");
            }
          }

          // Used to toggle the menu on smaller screens when clicking on the menu button
          function openNav() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
              x.className += " w3-show";
            } else { 
              x.className = x.className.replace(" w3-show", "");
            }
          }
          </script>

        </div>
        </div>



</body>
</html> 


