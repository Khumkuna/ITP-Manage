
<?php 
include('Connect.php');


if($_SESSION['Acc_ID']!="")
{
	$Acc_ID = $_SESSION['Acc_ID'];
}


if(isset($_POST['Delete']))
{
  $Project_IDX= $_POST['Project_IDX'];

  $SQL_Account = "DELETE FROM `Call-project_tb` WHERE Project_ID ='$Project_IDX';";
          if ($conn->query($SQL_Account)==TRUE) {
                echo "
                <script src='https://code.jquery.com/jquery-3.6.4.js'></script>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                  $(document).ready(function(){
                    Swal.fire({
                      title:'Delete Call Screen Project Complete !',
                      icon: 'error',
                      timer: 5000,
                      showConfirmButton: false
                    });
                  });
                  </script>";
                
                  header("refresh:2; url=Management-Call-Screen.php");

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
      <?php include('Navbar/Project-Verify-Bar.php'); ?>
      
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
        <p><h4 align="center">Verify and Transfer Job</h4> </p>
            <hr>
            <p>
             <table width="100%"> 
             <form action="Manage-Action-Call-Verify.php" method="POST">
              <tr>
                <td width="48%"><p>Job No.<input name="Re_JobZ" disabled type="text" class="form-control"  value="<?php echo $Re_JobZ ?>"></p></td>
                <td width="4%"></td>
                <td width="48%"><p>วันที่รับแจ้งเคส.<input name="Re_DateCreateZ" disabled type="text" class="form-control"  value="<?php echo $Re_DateCreateZ ?>"></p></td>
              </tr>
              <tr>
                <td width="48%"><p>ชื่ออุปกรณ์<input name="Re_DeviceZ" disabled type="text" class="form-control"  value="<?php echo $Re_DeviceZ ?>"></p></td>
                <td width="4%">
                </td>
                <td width="48%"><p>Serial-Number<input name="Re_SerialZ" disabled type="text" class="form-control"  value="<?php echo $Re_SerialZ ?>"></p></td>
              </tr>
              <tr>
                <td width="100%" colspan="3"><p>ชื่อศูนย์<input name="" disabled type="text" class="form-control"  value="<?php echo $GetCodeX.' '.$Si_Name.''.$Si_GroupZ; ?>"></p></td>
              </tr>
              <tr>
                <td width="48%"><p>ชื่อผู้แจ้งเคส<input name="Re_UsernameZ" disabled type="text" class="form-control"  value="<?php echo $Re_UsernameZ ?>"></p></td>
                <td width="4%"></td>
                <td width="48%"><p>เบอร์ติดต่อ<input name="Re_TelZ" disabled type="text" class="form-control"  value="<?php echo $Re_TelZ ?>"></p></td>
              </tr>
              <tr>
                <td width="48%">
                          <input type="button" onclick="document.getElementById('id01').style.display='block'"  value="Picture-1" <?php if($Pic_A_Z == ""){?> disabled class="form-control w3-theme-red" <?php }else{ ?> class="form-control w3-theme-d1" <?php } ?> />
                          <input type="button" onclick="document.getElementById('id02').style.display='block'"  value="Picture-2" <?php if($Pic_B_Z == ""){?> disabled class="form-control w3-theme-red" <?php }else{ ?> class="form-control w3-theme-d1" <?php } ?> />

                </td>
                <td width="4%"></td>
                <td width="48%">
                <input type="button" onclick="document.getElementById('id03').style.display='block'"  value="Picture-3" <?php if($Pic_C_Z == ""){?> disabled class="form-control w3-theme-red" <?php }else{ ?> class="form-control w3-theme-d1" <?php } ?> />
                <input type="button" onclick="document.getElementById('id04').style.display='block'"  value="Video" <?php if($Video_A_Z == ""){?> disabled class="form-control w3-theme-red" <?php }else{ ?> class="form-control w3-theme-d1" <?php } ?> />
                </td>
              </tr>
                



              <tr>
                <td width="100%" colspan="3"><p>ปัญหาหรืออาการเสีย<textarea name="Re_FailZ" disabled rows="4" class="form-control"  ><?php echo $Re_FailZ.''.$Re_EditZ ?></textarea></p></td>
              </tr>
              <tr>
                <td width="48%" colspan="3"><p>ชื่อผู้รับ Call<input name="Re_Call_ByZ" disabled type="text" class="form-control"  value="<?php echo $Re_Call_ByZ ?>"></p></td>
              </tr>
              <tr>
                <td width="100%" colspan="3"><p>ปัญหาหรืออาการเสีย<textarea name="Re_EditZ" rows="4" class="form-control"  ><?php echo $Re_EditZZ ?></textarea></p></td>
              </tr>

              <input name="Re_JobZ" hidden type="text" class="form-control"  value="<?php echo $Re_JobZ ?>">
              <input name="Verify_By" hidden type="text" class="form-control"  value="<?php echo $ACC_F ?>">
              <input name="Re_IDZ" hidden type="text" class="form-control"  value="<?php echo $Re_IDZ ?>">
              <tr>
                <td width="100%" colspan="3"><p>ส่งงานต่อ
                <?php
								$Get_Teams = "Select * From account_tb where 
                ACC_Status ='Remote-Teams' 
                or ACC_Status ='Onsite-Teams' 
                or ACC_Status ='ISP-Service'
                order by ACC_Status asc";
								$query_Teams=mysqli_query($conn,$Get_Teams);
								while ($data_Teams=mysqli_fetch_array($query_Teams))
								?>

                    <select name="ACC_ID_Verify" class="form-control" required="required">
											<option >เลือกเจ้าหน้าที่</option>
											<?php
											$query_Team=mysqli_query($conn,$Get_Teams);
											while ($data_Team=mysqli_fetch_array($query_Team)) {
												echo "<option value='".$data_Team['ACC_ID']."'>" .$data_Team['ACC_Fullname'].' ( '.$data_Team['ACC_Status'].' )' ."</option>" ;
										?>
											<?php } ?>
										</select>
                </p></td>
              </tr>
              
             </table>

            

             <table width="100%">
              <tr>
                <td width="30%">
                <button class="form-control w3-theme-d1 w3-margin-bottom" <?php if($ACC_S == "Report"){?> disabled <?php } ?> name="Submit"><i class="fa fa-windows"></i> &nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;</button>
              </form>


                </td>
                <td width="10%"></td>
                <form action="Manage-Call-Verify-Edit.php" method="POST">
                <td width="30%">
                      <input  name="Re_IDQ" hidden class="form-control" required="required" value="<?php echo $Re_IDQ ?>">
                      <input  name="Re_Job" hidden class="form-control" required="required" value="<?php echo $Re_Job ?>">
                      <button class="form-control w3-theme-d1 w3-margin-bottom" name="Submit" <?php if($ACC_S == "Report"){?> disabled <?php } ?>><i class="fa fa-pencil-square"></i> &nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</button>
                </td>
                </form>
              </tr>
             </table>

             
            </p>
      </div>  


     

      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
   <?php include('Navbar/NavbarMenu-Right.php'); ?>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>



</body>
</html> 