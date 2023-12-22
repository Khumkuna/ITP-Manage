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
  $_SESSION['Withdraw_Remark'] = $_POST['Withdraw_Remark'];
}
$Withdraw_Remark = $_SESSION['Withdraw_Remark'];
$Withdraw_No = $_SESSION['Withdraw_No'];
$Sub_ID = $_SESSION['Sub_ID'];
$Withdraw_Date = $_SESSION['Withdraw_Date'];


if(isset($_POST['Save'])==true)
{
  $Withdraw_No = $_POST['Withdraw_No'];
  $Sub_ID = $_POST['Sub_ID'];

  $Withdraw_Date = $_POST['Withdraw_Date'];
  $CuteDate = explode('-',$Withdraw_Date);
  $CYear = $CuteDate[0]+543;
  $CMonth = $CuteDate[1];
  $CDay = $CuteDate[2];

  $Withdraw_Date = $CDay.'/'.$CMonth.'/'.$CYear;


  $Withdraw_Remark = $_POST['Withdraw_Remark'];

  
  foreach($_POST['Ser_IDX'] as $Ser_IDX => $ValueS)
  {
    $SurUnit = $_POST['Ser_UnitX'][$Ser_IDX];
    $DevID = $_POST['Dev_ID'][$Ser_IDX];

    $result_Total=mysqli_query($conn, "SELECT * FROM serial_tb WHERE Ser_ID='$ValueS'")or die('Error In Session');
    $Total_Result=mysqli_fetch_array($result_Total);
    $Show_Out = $Total_Result['Ser_Out'];

    $Show_Total = $Show_Out+$SurUnit;

    

    

    $Check_ID = "Select * From withdraw_tb ORDER BY WD_ID DESC LIMIT 1";
      $result_Check_ID =mysqli_query($conn,$Check_ID);
      $row_Check_ID =mysqli_fetch_array($result_Check_ID);
      $Last_id = $row_Check_ID['WD_ID'];
      $Rest = substr($Last_id, -9);
      $Insert_id = $Rest + 1;
      $ars = sprintf("%09d", $Insert_id);
      $ref = "WDR-";
      $WD_ID = $ref.''.$ars;

      $SQL_AddWithdraw ="INSERT INTO `withdraw_tb` (`WD_ID`,`WD_No`,`WD_Date`,`WD_Unit`, `WD_Remark`, `Ser_ID`, `ACC_ID`, `Sub_ID`, `Dev_ID`) 
      VALUES ('$WD_ID', '$Withdraw_No','$Withdraw_Date','$SurUnit','$Withdraw_Remark','$ValueS','$Acc_ID ','$Sub_ID','$DevID')";
      if ($conn->query($SQL_AddWithdraw)==TRUE)
        {


              $Withdraw_NoX = 'Out-'.$Withdraw_No;
              $SQL_Serial = "UPDATE serial_tb SET Ser_Out='$Show_Total',Ser_Withdraw='$Withdraw_NoX' WHERE Ser_ID='$ValueS'";
                if ($conn->query($SQL_Serial)==TRUE) 
                {
                  echo '<script type="text/javascript">';
                  echo 'window.location.href = "Management_Report_Withdraw.php";';
                  echo '</script>';
                  
                }

        }
    
  }

}



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

      <form action="Management-Preview-Withdraw.php" method="POST">

      <table width="100%">
      <tr>
          <td width="50%"> <h5 class="w3-opacity" align="left">เลขที่เอกสาร: <?php echo $Withdraw_No ?> </h5></td>
          <td width="50%"> <h5 class="w3-opacity" align="left">วันที่เบิก: <?php echo $Withdraw_Date ?> </h5></td>
        </tr>
        <tr>
          <td colspan="2"> <h5 class="w3-opacity" align="left">ชื่อผู้รับ: <?php echo $Sub_ID?> </h5></td>
        </tr>
        <tr>
          <td colspan="2"> <h5 class="w3-opacity" align="left">หมายเหตุ: <?php echo $Withdraw_Remark?> </h5></td>
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
                  <th>เหลือ</th>
                  <th>เบิก</th>
                  <th>โครงการ</th>
                </tr>
              </thead>

              <?php 
              foreach($_POST['Ser_ID'] as $Ser_ID)
              {
                $Count++;
                  $result_ShowProject=mysqli_query($conn, "SELECT * FROM project_tb,device_tb,serial_tb WHERE 
                  project_tb.Project_ID = device_tb.Project_ID and
                  device_tb.Dev_ID = serial_tb.Dev_ID and
                  serial_tb.Ser_ID = '$Ser_ID' group by serial_tb.Dev_ID")or die('Error In Session');
                  $ShowProjec_Result=mysqli_fetch_array($result_ShowProject);
                  $Project_Name = $ShowProjec_Result['Project_Name'];
                  $Project_No = $ShowProjec_Result['Project_No'];
                  $Ser_Box = $ShowProjec_Result['Ser_Box'];
                  $Ser_Serial_First = $ShowProjec_Result['Ser_Serial_First'];
                  $Ser_Serial_Second = $ShowProjec_Result['Ser_Serial_Second'];
                  $Dev_ID = $ShowProjec_Result['Dev_ID'];
                  
                  $Dev_Model = $ShowProjec_Result['Dev_Model'];
                  
                  $Ser_SN = $ShowProjec_Result['Ser_SN'];

                  $Ser_Unit = $ShowProjec_Result['Ser_Unit'];
                  $Ser_Out = $ShowProjec_Result['Ser_Out'];

                  $Total = $Ser_Unit - $Ser_Out;

                  ?>
                    <tbody>
                            <tr>
                              <td>
                              <input type="checkbox" checked hidden  name="Ser_IDX[]" value="<?php echo $Ser_ID ?>">
                              <input type="text" hidden name="Dev_ID[]" value="<?php echo $Dev_ID ?>"> 
                                <?php echo $Count ?>
                              </td>
                              <td><?php echo $Dev_Model?></td>
                              <td><?php echo $Ser_Serial_Second?></td>
                              <td align="center"><?php echo $Total?></td>
                              <?php 
                              if($Ser_SN=="Fix")
                              { ?>
                                <td align="center"><input type="text" hidden  name="Ser_UnitX[]" value="1" >1</td>
                              <?php 
                              }
                              else
                              { ?>

                               <td align="center"><input type="Number" min="1" max="<?php echo $Total?>" name="Ser_UnitX[]" value="" >
                              
                              </td>
                                <?php  } ?>
                             
                             <td align="right"><?php echo ' ('.$Project_Name.'-'.$Project_No.')'?></td>

                            </tr>
                        </tbody>

                  <?php
              } ?>
              </table><br>
              <?php


            }

             
        ?>

        <input type="text" hidden name="Withdraw_No" value="<?php echo $Withdraw_No ?>"> 
        <input type="text" hidden name="Sub_ID" value="<?php echo $Sub_ID ?>"> 
        <input type="text" hidden name="Withdraw_Date" value="<?php echo $Withdraw_Date ?>"> 
        <input type="text" hidden name="Withdraw_Remark" value="<?php echo $Withdraw_Remark ?>"> 
        

        <button type="Submit" class="btn btn-info btn-block" name="Save">Save And Preview </button>


</form>

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
