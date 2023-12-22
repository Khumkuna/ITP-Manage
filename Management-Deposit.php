<?php 
include('Connect.php');


if($_SESSION['Acc_ID']!="")
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
      <?php include('Navbar/Deposit-Bar.php'); ?>
      
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
        <h2 class="w3-opacity" align="center">ข้อมูลการฝากสินค้าหรืออุปกรณ์</h2>
        <h4></h4><br>
        <hr class="w3-clear">
              <table width="100%" >
                    <thead>
                      <tr align="center">
                        <th width="30%">ชื่อผู้ฝาก</th>
                        <th width="30%">เบอร์ติดต่อ</th>
                        <th width="15%">แผนก</th>
                        <th width="10%">จำนวน</th>
                        <th width="15%" colspan="3">Tool</th>
                      </tr>
                      </thead>
                    </div>
                      <?php 
                      $sql_Si="Select * from Deposit_tb ORDER BY Dep_ID DESC";
                      $query_Si=mysqli_query($conn,$sql_Si);
                      $Num = 0;
                      while ($data_Si=mysqli_fetch_array($query_Si))                       
                      { 
                        $Num++;
                      $Dep_IDX = $data_Si["Dep_ID"];
                      $Dep_NameX = $data_Si["Dep_Name"];
                      $Dep_TelX = $data_Si["Dep_Tel"];
                      $Dep_DepartmentX = $data_Si["Dep_Department"];

                      $sql_Count="Select * from deposit_detail_tb where Dep_ID = '$Dep_IDX'";
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
                        <td align="left" ><?php echo  $Num.' '.$Dep_NameX; ?></td>
                        <td align="center" ><?php echo $Dep_TelX;?></td>
                        <td align="center" ><?php echo $Dep_DepartmentX;?></td>
                        <form action="Management-Deposit-Serial-Number.php" method="POST">
                            <input type="text" hidden  id="Dep_IDX" name="Dep_IDX" value="<?php echo $Dep_IDX ?>"></p>
                            <td align="center" ><input name="Unit" type="submit" value="<?php echo $Count;?>" style="border:0;background-color:transparent;color: blue;text-decoration:underline;"/></td>
                        </form>
                        <form action="Management-Add-Deposit-Device.php" method="POST">
                        <input type="text" hidden  id="Dep_IDX" name="Dep_IDX" value="<?php echo $Dep_IDX ?>"></p>
                        <td align="center" >
                          <button <?php if($Acc_NameX=="Admin-System"){ ?> hidden <?php } ?> class="btn" name="Select"><i class="fa fa-plus" ></i></button>
                        </td>
                        </form>

                        <form action="Management-Edit-Project.php" method="POST">
                        <input type="text" hidden  id="Project_IDX" name="Project_IDX" value="<?php echo $Project_IDX ?>"></p>
                        <td align="center" >
                          <button <?php if($Acc_NameX=="Admin-System"){ ?> hidden <?php } ?> class="btn" name="Select"><i class="fa fa-pencil" ></i></button>
                        </td>
                        </form>

                        <form action="Management-Project.php" method="POST">
                          
                        <input type="text" hidden  id="Project_IDX" name="Project_IDX" value="<?php echo $Project_IDX ?>"></p>
                        <td align="center" >
                        <button <?php if( $Count > 0){ ?> disabled  <?php } ?> <?php if($Acc_NameX=="Admin-System"){ ?> hidden <?php } ?> class="btn" name="Delete"><i class="fa fa-trash"></i></button>
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