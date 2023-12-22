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

if(isset($_POST['Select'])){ $_SESSION['Acc_IDX'] = $_POST['Acc_IDX'];}$Acc_IDX = $_SESSION['Acc_IDX'];



if(isset($_POST['Edit']))
{
  $Acc_IDX= $_POST['Acc_IDX'];
  $Acc_NameX= $_POST['Acc_NameX'];
  $Acc_UserX= $_POST['Acc_UserX'];
  $PasswordX= $_POST['Password'];
  $Con_PasswordX= $_POST['Con_Password'];
  $Acc_StatusX= $_POST['Status'];


  $salt = "f#@V)Hu^%Hgfds";
  $Password = sha1($Password . $salt);
  $Con_Password = sha1($Con_Password . $salt);

  if($Con_Password == $Password)
  {
    $SQL_Account = "UPDATE account_tb SET Acc_Name='$Acc_NameX',Acc_User='$Acc_UserX',Acc_Password='$Con_Password',Acc_Status='$Acc_StatusX' WHERE Acc_ID='$Acc_IDX'";
    if ($conn->query($SQL_Account)==TRUE) {
      echo '<script type="text/javascript">';
      echo 'alert("แก้ไขข้อมูล Account เรียบร้อย");';
      echo 'window.location.href = "Management.php";';
      echo '</script>';
    }
  }

 
}

if(isset($_POST['BrandDelete']))
{
  $Brand_ID= $_POST['Brand_ID'];

  $SQL_Brand = "DELETE FROM Brand_tb WHERE Brand_ID ='$Brand_ID';";
          if ($conn->query($SQL_Brand)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Edit-Account.php";';
            echo '</script>';
          }
}


if(isset($_POST['TypeDelete']))
{
  $Type_ID= $_POST['Type_ID'];

  $SQL_Type = "DELETE FROM Type_tb WHERE Type_ID ='$Type_ID';";
          if ($conn->query($SQL_Type)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Edit-Account.php";';
            echo '</script>';
          }
}


$result_ACCX=mysqli_query($conn, "SELECT * FROM Account_tb WHERE Acc_ID='$Acc_IDX'")or die('Error In Session');
$ACC_ResultX=mysqli_fetch_array($result_ACCX);
$Acc_NameX = $ACC_ResultX['Acc_Name'];
$Acc_UserX = $ACC_ResultX['Acc_User'];
$Acc_StatusX = $ACC_ResultX['Acc_Status'];

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
           <?php include('Navbar/Account-Bar.php'); ?>

      
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

              <h2 class="w3-opacity" align="center">แก้ไขรายชื่อผู้ใช้ระบบ</h2>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  เลือกรายการ
</button>
        <hr class="w3-clear">



              <form action="Management-Edit-Account.php" method="POST">
                <div class="w3-container w3-padding">
                <p>ชื่อ-นามสกุล
                <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" id="Acc_NameX" name="Acc_NameX" value="<?php echo $Acc_NameX ?>"></p>
                <p>User name
                <input type="text" class="form-control" placeholder="User.." id="Acc_UserX" name="Acc_UserX" value="<?php echo $Acc_UserX ?>"></p>
                <p>Password
                <input type="password" class="form-control" placeholder="Password.." id="Password" name="Password" value=""></p>
                <p>Confirm Password
                <input type="password" class="form-control" placeholder="Password.." id="Con_Password" name="Con_Password" value=""></p>
                  
                <?php 
                if($Acc_Status == "Admin")
                {?>
                <p>Status
                  <select name="Status" id="Status" class="form-control">
                  <option value="<?php echo $Acc_StatusX ?>"><?php echo $Acc_StatusX ?></option>

                  <?php 
                  if($Acc_StatusX == "Admin")
                  {?>
                      <option value="User" >User</option>
                  <?php }
                  elseif($Acc_StatusX == "User")
                  { ?>
                      <option value="Admin">Admin</option>
                 <?php  } ?>
                </select></p>

                <?php } ?>
                <input type="text" hidden id="Acc_IDX" name="Acc_IDX" value="<?php echo $Acc_IDX ?>"></p>
                <button type="Submit" class="btn btn-info btn-block" name="Edit"><i class="fa fa-pencil"></i> Edit</button>
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ข้อมูล Account ทั้งหมด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table width="100%" >
                    <thead>
                      <tr align="center">
                        <th width="30%">ชื่อ</th>
                        <th width="30%">Username</th>
                        <th width="30%">Status</th>
                        <th width="10%">Tool</th>
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
                      </tr>
                      <?php 
                      }
                      for($Num;$Num < 15;$Num++)
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</body>
</html> 


