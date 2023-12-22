<?php 
include('Connect.php');


if($_SESSION['Acc_ID']!="")
{
	$Acc_ID = $_SESSION['Acc_ID'];
}


if(isset($_POST['Delete']))
{
  $Acc_IDX= $_POST['Acc_IDX'];

  $SQL_Account = "DELETE FROM account_tb WHERE Acc_ID ='$Acc_IDX';";
          if ($conn->query($SQL_Account)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'alert("ลบ Account เรียบร้อย");';
            echo 'window.location.href = "Management.php";';
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
            echo 'window.location.href = "Management.php";';
            echo '</script>';
          }
}
if(isset($_POST['BrandDelete']))
{
  $Brand_ID= $_POST['Brand_ID'];

  $SQL_Brand = "DELETE FROM Brand_tb WHERE Brand_ID ='$Brand_ID';";
          if ($conn->query($SQL_Brand)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management.php";';
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
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;
}
</style>
<style>
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
      <?php include('Navbar/Account-Bar.php'); ?>
      
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
        <h2 class="w3-opacity" align="center">รายชื่อผู้ใช่งานระบบ</h2>
        <h4></h4><br>
        <hr class="w3-clear">
              <table width="100%" >
                    <thead>
                      <tr align="center">
                        <th width="30%">ชื่อ</th>
                        <th width="30%">Username</th>
                        <th width="30%">Status</th>
                        <th width="10%" colspan="2">Tool</th>
                      </tr>
                      </thead>
                    </div>
                      <?php 
                      $sql_Si="Select * from Account_tb ORDER BY Acc_ID ASC";
                      $query_Si=mysqli_query($conn,$sql_Si);
                      $Num = 0;
                      while ($data_Si=mysqli_fetch_array($query_Si))                       
                      { 
                        $Num++;
                      $Acc_IDX = $data_Si["Acc_ID"];
                      $Acc_NameX = $data_Si["Acc_Name"];
                      $Acc_UserX = $data_Si["Acc_User"];
                      $Acc_StatusX = $data_Si["Acc_Status"];


                      ?>
                    <div class="tbl-content">
                    <tbody>
                      <tr >                      
                        <td align="left" ><?php echo  $Num.'-'.$Acc_NameX; ?></td>
                        <td align="center" ><?php echo $Acc_UserX;?></td>
                        <td align="center" ><?php echo $Acc_StatusX;?></td>

                        <form action="Management-Edit-Account.php" method="POST">
                        <input type="text" hidden  id="Acc_IDX" name="Acc_IDX" value="<?php echo $Acc_IDX ?>"></p>
                        <td align="center" >
                          <button <?php if($Acc_NameX=="Admin-System"){ ?> hidden <?php } ?> class="btn" name="Select"><i class="fa fa-pencil" ></i></button>
                        </td>
                        </form>

                        <form action="Management.php" method="POST">
                        <input type="text" hidden  id="Acc_IDX" name="Acc_IDX" value="<?php echo $Acc_IDX ?>"></p>
                        <td align="center" >
                        <button <?php if($Acc_NameX=="Admin-System"){ ?> hidden <?php } ?> class="btn" name="Delete"><i class="fa fa-trash"></i></button>
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


      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h2 class="w3-opacity" align="center">รายชื่อ Sub-Contract</h2>
        <h4></h4><br>
        <hr class="w3-clear">
              <table width="100%" >
                    <thead>
                      <tr align="center">
                        <th width="30%">ชื่อศูนย์</th>
                        <th width="30%">เบอร์ติดต่อ</th>
                        <th width="30%">ประเภท</th>
                        <th width="10%" colspan="2">Tool</th>
                      </tr>
                      </thead>
                    </div>
                      <?php 
                      $sql_Sub="Select * from Sub_tb ORDER BY Sub_ID ASC";
                      $query_Sub=mysqli_query($conn,$sql_Sub);
                      $SiteCode = 0;
                      while ($data_Sub=mysqli_fetch_array($query_Sub))                       
                      { 
                        $SiteCode++;
                      $Sub_IDX = $data_Sub["Sub_ID"];
                      $Sub_SiteX = $data_Sub["Sub_Site"];
                      $Sub_NameX = $data_Sub["Sub_Name"];
                      $Sub_TelX = $data_Sub["Sub_Tel"];
                      $Sub_TypeX = $data_Sub["Sub_Type"];


                      ?>
                    <div class="tbl-content">
                    <tbody>
                      <tr >                      
                        <td align="left" ><?php echo  $SiteCode.'-'.$Sub_SiteX; ?></td>
                        <td align="center" ><?php echo $Sub_TelX;?></td>
                        <td align="center" ><?php echo $Sub_TypeX;?></td>

                        <form action="Management-Edit-Sub-Contract.php" method="POST">
                        <input type="text" hidden  id="Sub_IDX" name="Sub_IDX" value="<?php echo $Sub_IDX ?>"></p>
                        <td align="center" >
                          <button  class="btn" name="Select"><i class="fa fa-pencil" ></i></button>
                        </td>
                        </form>

                        <form action="Management.php" method="POST">
                        <input type="text" hidden  id="Sub_IDX" name="Sub_IDX" value="<?php echo $Sub_IDX ?>"></p>
                        <td align="center" >
                        <button  class="btn" name="SubDelete"><i class="fa fa-trash"></i></button>
                        </td>
                        </form>

                      </tr>
                      <?php 
                      }
                      for($SiteCode;$SiteCode < 10;$SiteCode++)
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


<?php include('Navbar/Footer.php'); ?>
 


</body>
</html> 