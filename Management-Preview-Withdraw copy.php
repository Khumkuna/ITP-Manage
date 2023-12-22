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


if(isset($_POST['Next'])==true)
{
  $_SESSION['Withdraw_No'] = $_POST['Withdraw_No'];
  $_SESSION['Sub_ID'] = $_POST['Sub_ID'];
  $_SESSION['Withdraw_Date'] = $_POST['Withdraw_Date'];
}
$Withdraw_No = $_SESSION['Withdraw_No'];
$Sub_ID = $_SESSION['Sub_ID'];
$Withdraw_Date = $_SESSION['Withdraw_Date'];


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



<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;
}
</style>
</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<?php include('Navbar/Navbar-Head.php');  ?>


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
      <?php include('Navbar/Project-Bar.php'); ?>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p><?php echo $Ser; ?></p>
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
      <p>
      <h4 class="w3-opacity" align="center">ข้อมูลการเบิกอุปกรณ์ </h4></p>
      <table width="100%">
        <tr>
          <td colspan="2"> <h5 class="w3-opacity" align="left">เลขที่เอกสาร: <?php echo $Withdraw_No?> </h5></td>
        </tr>
        <tr>
          <td width="50%"> <h5 class="w3-opacity" align="left">ชื่อผู้รับ: <?php echo $Sub_ID ?> </h5></td>
          <td width="50%"> <h5 class="w3-opacity" align="left">วันที่เบิก: <?php echo $Withdraw_Date ?> </h5></td>
        </tr>
      </table>   

        <hr class="w3-clear">

        <?php 
              if(isset($_POST['Next'])==true)
              {
              $Count=0;

              ?>
                  <table  width="100%">
                  <thead>
                    <tr align="center">
                      <th>ลำดับ</th>
                      <th>Model</th>
                      <th>Serial Number</th>
                      <th>จำนวน</th>
                      <th>โครงการ</th>
                    </tr>
                  </thead>
                    <?php

              // $Withdraw = $this->input->post('Withdraw');
              $Ser_ID = $_POST['Ser_ID'];
              $Withdraw = $_POST['Withdraw'];
              foreach($Ser_ID as $Ser_ID => $Ser_ID)
              {$Count++;
                  
                $WithdrawX = $Withdraw[$Ser_ID];
                  echo $WithdrawX.',';
                  


                  // $result_ShowProject=mysqli_query($conn, "SELECT * FROM project_tb,device_tb,serial_tb WHERE 
                  // project_tb.Project_ID = device_tb.Project_ID and
                  // device_tb.Dev_ID = serial_tb.Dev_ID and
                  // serial_tb.Ser_ID = '$Ser_ID' group by serial_tb.Dev_ID")or die('Error In Session');
                  // $ShowProjec_Result=mysqli_fetch_array($result_ShowProject);
                  // $Project_Name = $ShowProjec_Result['Project_Name'];
                  // $Project_No = $ShowProjec_Result['Project_No'];
                  // $Ser_Box = $ShowProjec_Result['Ser_Box'];
                  // $Ser_Serial_First = $ShowProjec_Result['Ser_Serial_First'];
                  // $Ser_Unit = $ShowProjec_Result['Ser_Unit'];
                  // $Dev_Model = $ShowProjec_Result['Dev_Model'];
                  // $Ser_Unit = $ShowProjec_Result['Ser_Unit'];

                  ?>
                  <!-- <tbody>
                    <tr>
                      <td><?php echo $Count ?></td>
                      <td><?php echo $Dev_Model?></td>
                      <td><?php echo $Ser_Serial_First?></td>
                      <td align="center"><?php echo $Ser_ID?></td>
                      <td align="right"><?php echo ' ('.$Project_Name.'-'.$Project_No.')'?></td>

                    </tr>
                </tbody> -->
               
                 
                <?php
                }

                ?>
                 </table><br>
                 <?php
              }

             
        ?>



<button type="Submit" class="btn btn-info btn-block" name="Next">Save And Preview </button>

<br></div>  

      


     

      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
   <?php include('Navbar/Right-Bar.php'); ?>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<div class="footer">
<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5" align="center"><br>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Prachya Khumkuna</a></p>
</footer>

</div>
<div class="container">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- demo left sidebar -->
		<ins class="adsbygoogle"
			 style="display:block"
			 data-ad-client="ca-pub-6724419004010752"
			 data-ad-slot="7706376079"
			 data-ad-format="auto"
			 data-full-width-responsive="true"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    


</body>
</html> 


<script>
var nextI = $("input").index(this)+1,
      next=$("input").eq(nextI);
next.focus();
  </script>
