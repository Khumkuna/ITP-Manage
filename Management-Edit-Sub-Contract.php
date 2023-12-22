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

if(isset($_POST['Select'])){ $_SESSION['Sub_IDX'] = $_POST['Sub_IDX'];}$Sub_IDX = $_SESSION['Sub_IDX'];



if(isset($_POST['Edit']))
{
  $Sub_NameX= $_POST['Sub_NameX'];
  $Sub_SiteX= $_POST['Sub_SiteX'];
  $Sub_AddressX= $_POST['Sub_AddressX'];
  $Sub_TelX= $_POST['Sub_TelX'];
  $Sub_TypeX= $_POST['Sub_TypeX'];


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
            echo 'window.location.href = "Management-Edit-Sub-Contract.php";';
            echo '</script>';
          }
}


if(isset($_POST['TypeDelete']))
{
  $Type_ID= $_POST['Type_ID'];

  $SQL_Type = "DELETE FROM Type_tb WHERE Type_ID ='$Type_ID';";
          if ($conn->query($SQL_Type)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Edit-Sub-Contract.php";';
            echo '</script>';
          }
}


$result_ACCX=mysqli_query($conn, "SELECT * FROM Sub_tb WHERE Sub_ID='$Sub_IDX'")or die('Error In Session');
$ACC_ResultX=mysqli_fetch_array($result_ACCX);
$Sub_NameX = $ACC_ResultX['Sub_Name'];
$Sub_SiteX = $ACC_ResultX['Sub_Site'];
$Sub_AddressX = $ACC_ResultX['Sub_Address'];
$Sub_TelX = $ACC_ResultX['Sub_Tel'];
$Sub_TypeX = $ACC_ResultX['Sub_Type'];

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

              <h2 class="w3-opacity" align="center">แก้ไขรายชื่อ Sub-Contract</h2>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  เลือกรายการ
</button>
        <hr class="w3-clear">



              <form action="Management-Edit-Sub-Contract.php" method="POST">
                <div class="w3-container w3-padding">
                <p>ชื่อ-นามสกุล
                <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" id="Sub_NameX" name="Sub_NameX" value="<?php echo $Sub_NameX ?>"></p>
                <p>ชื่อศูนย์บริการ
                <input type="text" class="form-control" placeholder="User.." id="Sub_SiteX" name="Sub_SiteX" value="<?php echo $Sub_SiteX ?>"></p>
                <p>ที่อยู่
                <textarea class="form-control" name="Sub_AddressX"  rows="3" value=""><?php echo $Sub_AddressX ?></textarea></p>
                <p>เบอร์ติดต่อ
                <input type="text" class="form-control" placeholder="Password.." id="Sub_TelX" name="Sub_TelX" value="<?php echo $Sub_TelX ?>"></p>
                  
                <p>Status
                  <select name="Sub_TypeX" id="Sub_TypeX" class="form-control">
                  <option value="<?php echo $Sub_TypeX ?>"><?php echo $Sub_TypeX ?></option>

                  <?php 
                if($Acc_StatusX == "ทีมช่าง")
                  { ?>
                      <option value="ศูนย์ซ่อม">ศูนย์ซ่อม</option>
                 <?php  }
                 elseif($Sub_TypeX == "ศูนย์ซ่อม")
                 {?>
                     <option value="ทีมช่าง" >ทีมช่าง</option>
                 <?php } ?>
                </select></p>

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

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
 
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
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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
                        <th width="30%">ชื่อศูนย์</th>
                        <th width="30%">เบอร์ติดต่อ</th>
                        <th width="30%">ประเภท</th>
                        <th width="10%" >Tool</th>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</body>
</html> 


