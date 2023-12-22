<?php 
include('Connect.php');


if(isset($_SESSION['Acc_ID'])!="" || isset($_SESSION['Acc_ID']))
{
	$Acc_ID = $_SESSION['Acc_ID'];
}




if(isset($_POST['Delete']))
{
  $Project_IDX= $_POST['Project_IDX'];

  $SQL_Account = "DELETE FROM project_tb WHERE Project_ID ='$Project_IDX';";
          if ($conn->query($SQL_Account)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'alert("ลบโครงการเรียบร้อย");';
            echo 'window.location.href = "Management-Project.php";';
            echo '</script>';
          }
}

if(isset($_POST['SubDelete']))
{
  $Sub_IDX= $_POST['Sub_IDX'];

  $SQL_Sub = "DELETE FROM Sub_tb WHERE Sub_ID ='$Sub_IDX';";
          if ($conn->query($SQL_Sub)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'alert("ลบ Account เรียบร้อย");';
            echo 'window.location.href = "Management-Project.php";';
            echo '</script>';
          }
}
if(isset($_POST['BrandDelete']))
{
  $Brand_ID= $_POST['Brand_ID'];

  $SQL_Brand = "DELETE FROM Brand_tb WHERE Brand_ID ='$Brand_ID';";
          if ($conn->query($SQL_Brand)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Project.php";';
            echo '</script>';
          }
}
if(isset($_POST['TypeDelete']))
{
  $Type_ID= $_POST['Type_ID'];

  $SQL_Type = "DELETE FROM Type_tb WHERE Type_ID ='$Type_ID';";
          if ($conn->query($SQL_Type)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Project.php";';
            echo '</script>';
          }
}







$result_ACC=mysqli_query($conn, "SELECT * FROM Account_tb WHERE Acc_ID='$Acc_ID'")or die('Error In Session');
$ACC_Result=mysqli_fetch_array($result_ACC);
$Acc_Name = $ACC_Result['Acc_Name'];
$Acc_Status = $ACC_Result['Acc_Status'];

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

<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

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
        <p><?php echo $Acc_ID; ?></p>
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
        <h2 class="w3-opacity" align="center">ข้อมูลการเบิกอุปกรณ์ทั้งหมด</h2>
        <h4></h4><br>
        <hr class="w3-clear">
              <table width="100%" >
                    <thead>
                      <tr align="center">
                        <th width="30%">เลขที่เอกสารเบิก</th>
                        <th width="30%">ชื่อผู้ทำรายการ</th>
                        <th width="15%">วันที่เบิก</th>
                        <th width="15%" colspan="3">Tool</th>
                      </tr>
                      </thead>
                    </div>
                      <?php 
                      $sql_Si="Select * from Account_tb,withdraw_tb where Account_tb.ACC_ID = withdraw_tb.ACC_ID group by withdraw_tb.WD_No ORDER BY withdraw_tb.WD_ID DESC";
                      $query_Si=mysqli_query($conn,$sql_Si);
                      while ($data_Si=mysqli_fetch_array($query_Si))                       
                      { 
                      $WD_No = $data_Si["WD_No"];
                      $WD_Date = $data_Si["WD_Date"];
                      $WD_Unit = $data_Si["WD_Unit"];
                      $Acc_Name = $data_Si["Acc_Name"];
                      





                      $Project_TypeX = $data_Si["Project_Type"];

                      $sql_Count="Select * from Device_tb where Project_ID = '$Project_IDX'";
                      $query_Count=mysqli_query($conn,$sql_Count);
                      $Count = 0;
                      while ($data_Count=mysqli_fetch_array($query_Count))                       
                      { 
                        $Count++;
                      }





                      ?>
                    <div class="tbl-content">
                    <tbody>
                      <tr >                      
                        <td align="left" ><?php echo  $WD_No; ?></td>
                        <td align="center" ><?php echo $Acc_Name;?></td>
                        <td align="center" ><?php echo $WD_Date;?></td>
                        <form action="Management_Report_Withdraw.php" method="POST">
                        <input type="text" hidden  id="Withdraw_No" name="Withdraw_No" value="<?php echo $WD_No ?>"></p>
                        <td align="center" >
                          <button <?php if($Acc_NameX=="Admin-System"){ ?> hidden <?php } ?> class="btn" name="Save"><i class="fa fa-print" ></i></button>
                        </td>
                        </form>


                      </tr>
                      <?php 
                      }
                      for($Num;$Num < 10;$Num++)
                      { ?>
                        <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>

                      <?php }
                      ?>

                       </tbody>
                      </table><br>
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

</body>
</html> 


