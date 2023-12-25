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



if(isset($_POST['Select']))
{ 
  $_SESSION['Project_IDX'] = $_POST['Project_IDX'];
}
$Project_IDX = $_SESSION['Project_IDX'];

$result_ProX=mysqli_query($conn, "SELECT * FROM `Call-project_tb` WHERE Project_ID='$Project_IDX'")or die('Error In Session');
$Project_ResultX=mysqli_fetch_array($result_ProX);
$Project_NameX = $Project_ResultX['Project_Name'];
$Project_NoX = $Project_ResultX['Project_No'];
$Project_DateStartX = $Project_ResultX['Project_DateStart'];
$Project_SLAX = $Project_ResultX['Project_SLA'];
$Project_Type_SLAX = $Project_ResultX['Project_Type_SLA'];

if($Project_Type_SLAX == "No"){$Showtext = "ไม่รวมวันหยุด";}
if($Project_Type_SLAX == "Yes"){$Showtext = "รวมวันหยุด";}


// <image src="image/Logo.png" width="250px" ></image>


if(isset($_POST['Edit']))
{
  $Project_IDX= $_POST['Project_IDX'];
  $Project_NameX= $_POST['Project_NameX'];
  $Project_NoX= $_POST['Project_NoX'];
  $Project_SLAX= $_POST['Project_SLAX'];
  $Project_Type_SLAX= $_POST['Project_Type_SLAX'];

    $SQL_Project = "UPDATE `Call-project_tb` SET Project_Name='$Project_NameX',Project_No='$Project_NoX',Project_SLA='$Project_SLAX',Project_Type_SLA='$Project_Type_SLAX' WHERE Project_ID='$Project_IDX'";
    if ($conn->query($SQL_Project)==TRUE) {

      echo "
      <script src='https://code.jquery.com/jquery-3.6.4.js'></script>
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script>
            $(document).ready(function(){
              Swal.fire({
                title:'Edit Project For Call-Screen Complete!',
                icon: 'success',
                timer: 5000,
                showConfirmButton: false
              });
            });
            </script>";
          
            header("refresh:2; url=Management-Call-Screen.php");
    


    }
 

 
}

if(isset($_POST['BrandDelete']))
{
  $Brand_ID= $_POST['Brand_ID'];

  $SQL_Brand = "DELETE FROM Brand_tb WHERE Brand_ID ='$Brand_ID';";
          if ($conn->query($SQL_Brand)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Edit-Project.php";';
            echo '</script>';
          }
}


if(isset($_POST['TypeDelete']))
{
  $Type_ID= $_POST['Type_ID'];

  $SQL_Type = "DELETE FROM Type_tb WHERE Type_ID ='$Type_ID';";
          if ($conn->query($SQL_Type)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Edit-Project.php";';
            echo '</script>';
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
           <?php include('Navbar/Project-Call-Bar.php'); ?>

      
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

              <h2 class="w3-opacity" align="center">แก้ไขข้อมูลโครงการของ Call-Screen</h2>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  เลือกรายการ
</button>
        <hr class="w3-clear">



              <form action="Management-Edit-Call-Screen-Project.php" method="POST">
                <div class="w3-container w3-padding">
                <p>ชื่อโครงการ
                <input type="text" class="form-control" placeholder="ชื่อโครงการ" id="Project_NameX" name="Project_NameX" value="<?php echo $Project_NameX ?>"></p>
                <p>เลขที่สัญญา
                <input type="text" class="form-control" placeholder="เลขที่สัญญา" id="Project_NoX" name="Project_NoX" value="<?php echo $Project_NoX ?>"></p>
                <p>Service Level Agreements (SLA)
                <input type="Number" class="form-control" placeholder="จำนวน ชั่วโมง"  min="24" id="Project_SLA" name="Project_SLAX" value="<?php echo $Project_SLAX ?>"></p>


                <p>ประเภท Service Level Agreements (SLA)
                  <select name="Project_Type_SLAX" id="Project_Type_SLAX" class="form-control">
                  <option value="<?php echo $Project_Type_SLAX ?>"><?php echo $Showtext ?></option>
                  <option value="No">ไม่รวมวันหยุด</option>
                  <option value="Yes">รวมวันหยุด</option>
                </select></p>


                <input type="text" hidden id="Project_IDX" name="Project_IDX" value="<?php echo $Project_IDX ?>"></p>
                <button type="Submit" class="btn btn-info btn-block" name="Edit"><i class="fa fa-pencil"></i> Edit</button>
                </div>
              </form>
              <br>
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
        <h5 class="modal-title" id="exampleModalLabel">ข้อมูลโครงการทั้งหมด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table width="100%" >
                    <thead>
                      <tr align="center">
                        <th width="30%">ชื่อโครงการ</th>
                        <th width="30%">เลขที่สัญญา</th>
                        <th width="30%">วันที่เริ่มสัญญา</th>
                        <th width="10%">Tool</th>
                      </tr>
                      </thead>
                    </div>
                      <?php 
                      $sql_Si="Select * from `call-project_tb` ORDER BY Project_ID ASC";
                      $query_Si=mysqli_query($conn,$sql_Si);
                      $Num = 0;
                      while ($data_Si=mysqli_fetch_array($query_Si))                       
                      { 
                        $Num++;
                      $Project_IDX = $data_Si["Project_ID"];
                      $Project_NameX = $data_Si["Project_Name"];
                      $Project_NoX = $data_Si["Project_No"];
                      $Project_DatestartX = $data_Si["Project_Datestart"];


                      ?>
                    <div class="tbl-content">
                    <tbody>
                      <tr >                      
                        <td align="left" ><?php echo  $Num.'-'.$Project_NameX; ?></td>
                        <td align="center" ><?php echo $Project_NoX;?></td>
                        <td align="center" ><?php echo $Project_DatestartX;?></td>

                        <form action="Management-Edit-Call-Screen-Project.php" method="POST">
                        <input type="text" hidden  id="Project_IDX" name="Project_IDX" value="<?php echo $Project_IDX ?>"></p>
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


