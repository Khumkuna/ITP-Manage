<?php 
include('Connect.php');


if($_SESSION['Acc_ID']!="")
{
	$Acc_ID = $_SESSION['Acc_ID'];
}

if(isset($_POST['Save']))
{
  $Project_Name = $_POST['Project_Name'];
  $Project_No = $_POST['Project_No'];
  $Project_Datestart = $_POST['Project_Datestart'];
  $Project_Warranty = $_POST['Project_Warranty'];
  $Project_Type = $_POST['Project_Type'];
  $Project_Datecreate = $_POST['Project_Datecreate'];



  $Check_Project=mysqli_query($conn, "SELECT * FROM Project_tb WHERE Project_No='$Project_No' and Project_Name ='$Project_Name'")or die('Error In Session');
  $Project_Check=mysqli_fetch_array($Check_Project);
  $Project_ID = $Project_Check['Project_ID'];

  if($Project_ID == "")
  {
      $Check_ID = "Select * From Project_tb ORDER BY Project_ID DESC LIMIT 1";
      $result_Check_ID =mysqli_query($conn,$Check_ID);
      $row_Check_ID =mysqli_fetch_array($result_Check_ID);
      $Last_id = $row_Check_ID['Project_ID'];
      $Rest = substr($Last_id, -3);
      $Insert_id = $Rest + 1;
      $ars = sprintf("%03d", $Insert_id);
      $ref = "Pro-";
      $Project_IDX = $ref.''.$ars;


      $Project_Datecreate = date ('d/m/Y',strtotime('+543 years'));


        $SQL_AddProject ="INSERT INTO `Project_tb` (`Project_ID`,`Project_Name`,`Project_No`,`Project_Datestart`, `Project_Warranty`, `Project_Type`, `Project_Datecreate`) 
        VALUES ('$Project_IDX', '$Project_Name','$Project_No','$Project_Datestart','$Project_Warranty','$Project_Type','$Project_Datecreate')";
        if ($conn->query($SQL_AddProject)==TRUE)
          {
            echo '<script type="text/javascript">';
            echo 'alert("บันทึกข้อมูล Project เรียบร้อย");';
            echo 'window.location.href = "Management-project.php";';
            echo '</script>';

          }
  }
  else
  {
              echo '<script type="text/javascript">';
							echo 'alert("ชื่อโครงการ และ เลขที่สัญญา ถูกใช้งานแล้ว");';
              echo 'window.location.href = "Management-Create-Account.php";';

							echo '</script>';
  }

}
if(isset($_POST['Edit']))
{
  $Acc_IDX= $_POST['Acc_IDX'];

  $SQL_Account = "UPDATE account_tb SET Acc_Password='b9b3786a1084cae5c1ee67d31835b99f0e73fe1e' WHERE Acc_ID='$Acc_IDX'";
          if ($conn->query($SQL_Account)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'alert("Reset Password เรียบร้อย");';
            echo 'window.location.href = "Management-Create-Account.php";';
            echo '</script>';
          }
}

if(isset($_POST['Delete']))
{


  $Acc_IDX= $_POST['Acc_IDX'];

  $SQL_Account = "DELETE FROM account_tb WHERE Acc_ID ='$Acc_IDX';";
          if ($conn->query($SQL_Account)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'alert("ลบข้อมูลเรียบร้อย");';
            echo '</script>';
          }
}


if(isset($_POST['BrandDelete']))
{
  $Brand_ID= $_POST['Brand_ID'];

  $SQL_Brand = "DELETE FROM Brand_tb WHERE Brand_ID ='$Brand_ID';";
          if ($conn->query($SQL_Brand)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Create-Project.php";';
            echo '</script>';
          }
}


if(isset($_POST['TypeDelete']))
{
  $Type_ID= $_POST['Type_ID'];

  $SQL_Type = "DELETE FROM Type_tb WHERE Type_ID ='$Type_ID';";
          if ($conn->query($SQL_Type)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Create-Project.php";';
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.min.js"></script>
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}


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
           <?php include('Navbar/Project-Bar.php'); ?>

      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
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
        <h2 class="w3-opacity" align="center">สร้างรายการเบิกอุปกรณ์ที่ฝาก</h2>
        <hr class="w3-clear">

              <form action="Management-Select-Withdraw.php" method="POST">
                <div class="w3-container w3-padding">
                <p>เลขที่เอกสารเบิก
                <input type="text" class="form-control" placeholder="เลขที่เอกสารเบิก" id="Withdraw_No" name="Withdraw_No" value=""></p>

                <p>เลือกผู้รับ
                    <select name="Sub_ID" class="form-control">
                    <option value="">เลือกผู้ฝากอุปกรณ์</option>
                    <?php 
                    $query ="SELECT Dep_ID, Dep_Name, Dep_Department FROM deposit_tb";
                    $result = $conn->query($query);
                    if($result->num_rows> 0){
                        while($OptionType=$result->fetch_assoc()){
                        $Dep_Name =$OptionType['Dep_Name'];
                        $Dep_ID =$OptionType['Dep_ID'];
                        $Dep_Department =$OptionType['Dep_Department'];
                    ?>
                    <option value="<?php echo $Dep_ID; ?>" ><?php echo $Dep_Name.' ( '.$Dep_Department.' ) ' ?> </option>
                    <?php
                    }}
                    ?>
                  </select></p>

                  <p>หมายเหตุ
                  <input type="text" class="form-control" placeholder="หมายเหตุการเบิก" id="Withdraw_Remark" name="Withdraw_Remark" value=""></p>


    
                <p>วันที่ทำการเบิก
                <input type="date" class="form-control"  id="Withdraw_Date" name="Withdraw_Date" value=""></p>
             
                <button type="Submit" class="btn btn-info btn-block" name="Next">Next Step <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></button>
                </div>
              </form>
              <br>
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

<!-- Footer -->
<?php include('Navbar/Footer.php'); ?>

 
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

</body>
</html> 