
<?php 
include('Connect.php');


if($_SESSION['Acc_ID']!="")
{
	$Acc_ID = $_SESSION['Acc_ID'];
}


if(isset($_POST['Delete']))
{
  $Re_Job= $_POST['Re_Job'];


  $Delete=mysqli_query($conn, "SELECT * FROM repair_tb WHERE Re_Job='$Re_Job'")or die('Error In Session');
  $Delete_Result=mysqli_fetch_array($Delete);
  $Pic_A = $Delete_Result['Pic_A'];
  $Pic_B = $Delete_Result['Pic_B'];
  $Pic_C = $Delete_Result['Pic_C'];
  $Video_A = $Delete_Result['Video_A'];

    unlink($Pic_A);
    unlink($Pic_B);
    unlink($Pic_C);
    unlink($Video_A);

  $SQL_Account = "DELETE FROM `repair_tb` WHERE Re_Job ='$Re_Job';";
          if ($conn->query($SQL_Account)==TRUE) {
                echo "
                <script src='https://code.jquery.com/jquery-3.6.4.js'></script>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                  $(document).ready(function(){
                    Swal.fire({
                      title:'Delete Call Screen Project Complete !',
                      icon: 'success',
                      timer: 5000,
                      showConfirmButton: false
                    });
                  });
                  </script>";
                
                  header("refresh:2; url=Manage-Call-Screen.php");

          }
}


if(isset($_POST['Select_Project'])&&isset($_POST['Select_Project']) !="" )
{
          $_SESSION['Project_Selected'] = $_POST['Project_Selected'];
          $Project_Selected = $_SESSION['Project_Selected'];
        
          
          $result_Rep=mysqli_query($conn, "SELECT * FROM `call-project_tb` WHERE Project_ID='$Project_Selected'");
          $Rep_Result=mysqli_fetch_array($result_Rep);
          $Project_ID_Selected = $Rep_Result['Project_ID'];
          $Project_Name_Selected = $Rep_Result['Project_Name'];
          $Project_No_Selected = $Rep_Result['Project_No'];
}



if(isset($_POST['Select_Device'])&&isset($_POST['Select_Device']) !="" )
{
          $_SESSION['Device_Selected'] = $_POST['Device_Selected'];
          $Device_Selected = $_SESSION['Device_Selected'];

          $_SESSION['Project_ID_Selected'] = $_POST['Project_ID_Selected'];
          $Project_ID_Selected = $_SESSION['Project_ID_Selected'];
        

          $result_Show=mysqli_query($conn,"Select * from brand_tb,type_tb,`call-device_tb` where `call-device_tb`.brand_ID = brand_tb.brand_ID
          and `call-device_tb`.Type_ID = type_tb.Type_ID and `call-device_tb`.Dev_ID = '$Device_Selected'");
          $Rep_Result_Show=mysqli_fetch_array($result_Show);
          $Brand_Name_Selected = $Rep_Result_Show['Brand_Name'];
          $Type_Name_Selected = $Rep_Result_Show['Type_Name'];
          $Dev_Model_Selected = $Rep_Result_Show['Dev_Model'];
          $Dev_ID_Selected = $Rep_Result_Show['Dev_ID'];
          $Dev_Status_Select = $Rep_Result_Show['Dev_Type'];

          

          $result_Rep=mysqli_query($conn, "SELECT * FROM `call-project_tb` WHERE Project_ID='$Project_ID_Selected'");
          $Rep_Result=mysqli_fetch_array($result_Rep);
          $Project_ID_Selected = $Rep_Result['Project_ID'];
          $Project_Name_Selected = $Rep_Result['Project_Name'];
          $Project_No_Selected = $Rep_Result['Project_No'];




}
if(isset($_POST['Selected_Serial'])&&isset($_POST['Selected_Serial']) !="" )
{


          $_SESSION['Ser_ID_Selected'] = $_POST['Ser_ID_Selected'];
          $Ser_ID_Selected = $_SESSION['Ser_ID_Selected'];

          
          $_SESSION['Device_Selected'] = $_POST['Device_Selected'];
          $Device_Selected = $_SESSION['Device_Selected'];

          $_SESSION['Project_ID_Selected'] = $_POST['Project_ID_Selected'];
          $Project_ID_Selected = $_SESSION['Project_ID_Selected'];
        

          $result_Show=mysqli_query($conn,"Select * from brand_tb,type_tb,`call-device_tb` where `call-device_tb`.brand_ID = brand_tb.brand_ID
          and `call-device_tb`.Type_ID = type_tb.Type_ID and `call-device_tb`.Dev_ID = '$Device_Selected'");
          $Rep_Result_Show=mysqli_fetch_array($result_Show);
          $Brand_Name_Selected = $Rep_Result_Show['Brand_Name'];
          $Type_Name_Selected = $Rep_Result_Show['Type_Name'];
          $Dev_Model_Selected = $Rep_Result_Show['Dev_Model'];
          $Dev_ID_Selected = $Rep_Result_Show['Dev_ID'];
          $Dev_Status_Select = $Rep_Result_Show['Dev_Type'];

          

          $result_Rep=mysqli_query($conn, "SELECT * FROM `call-project_tb` WHERE Project_ID='$Project_ID_Selected'");
          $Rep_Result=mysqli_fetch_array($result_Rep);
          $Project_ID_Selected = $Rep_Result['Project_ID'];
          $Project_Name_Selected = $Rep_Result['Project_Name'];
          $Project_No_Selected = $Rep_Result['Project_No'];


          $result_Serial=mysqli_query($conn,"Select * from `call-serial_tb` where Ser_ID = '$Ser_ID_Selected'");
          $Rep_Result_Serial=mysqli_fetch_array($result_Serial);
          $Ser_Serial_Second_Selected = $Rep_Result_Serial['Ser_Serial_Second'];




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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"> </script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"> </script>

<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}

</style>
</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<?php include('Navbar/Navbar-Head.php');  ?>


<!-- Page Container -->
<div class="w3-container-fluit w3-content" style="max-width:1400px;margin-top:80px">    
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
      <div class="w3-card w3-round w3-white ">
        <div class="w3-container">          
        <p><h4 align="center">Open Call</h4> </p>
        
          <p>
         


          <!-- <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Genarate Job-Number">
            <div class="input-group-append">
                <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i></button>  
            </div>
          </div> -->

          <?php
          if($Project_ID_Selected != '')
          { ?>
            <div class="input-group mb-3">
            <input type="text"  class="form-control"  disabled  value="<?php echo $Project_Name_Selected.' ('.$Project_No_Selected.')' ?>">
            </div>
            <?php
          } 
          else
          {
          ?>

          <form action="Manage-Call-Screen.php" method="POST">

          <div class="input-group mb-3">
          <?php
								$Get_ShowProject = "Select * From `Call-project_tb`  order by Project_ID asc";
								$query_ShowProject=mysqli_query($conn,$Get_ShowProject);
								while ($data_ShowProject=mysqli_fetch_array($query_ShowProject))
								
								?>
                    <select name="Project_Selected" class="form-control" required="required">
											<option value=<?php echo  $data_ShowProject['Dev_Model']; ?> >เลือกโครงการ-สัญญา</option>
											<?php
											$query_Show_Project=mysqli_query($conn,$Get_ShowProject);
											while ($data_Project=mysqli_fetch_array($query_Show_Project)) {
												echo "<option value='".$data_Project['Project_ID']."'>" .$data_Project['Project_Name'].' ('.$data_Project['Project_No'].')'."</option>" ;
										?>
											<?php } ?>
										</select>
                <button class="w3-button w3-theme-d1 w3-margin-bottom" id="Select"  name="Select_Project"><i class="fa fa-search"></i> Select</button>
          </div>
          </form>
          <?php } ?>

          <?php 
          if($Dev_ID_Selected != '')
          {
          ?>
            <div class="input-group mb-3">
              <input type="text"  class="form-control"  disabled placeholder="รายการอุปกรณ์ที่เลือก" value="<?php echo $Brand_Name_Selected.'-'.$Dev_Model_Selected ?>">
            </div>
            <?php
          }
            else {

          ?>
            

           
          <form action="Manage-Call-Screen.php" method="POST">


          <div class="input-group mb-3">
          <?php
								$Get_ShowDev = "Select * From `Call-device_tb` where Project_ID ='$Project_ID_Selected' order by Dev_ID asc";
								$query_ShowDev=mysqli_query($conn,$Get_ShowDev);
								while ($data_ShowDev=mysqli_fetch_array($query_ShowDev))
								
								?>
                    <select name="Device_Selected" class="form-control" required="required">
											<option value=<?php echo  $data_ShowDev['Dev_Model']; ?> >เลือกอุปกรณ์</option>
											<?php
											$query_Show=mysqli_query($conn,$Get_ShowDev);
											while ($data_Show=mysqli_fetch_array($query_Show)) {
												echo "<option value='".$data_Show['Dev_ID']."'>" .$data_Show['Dev_Model'] ."</option>" ;
										?>
											<?php } ?>
										</select>
                <input type="text" name="Project_ID_Selected" class="form-control"  id="Project_ID_Selected" hidden value="<?php echo $Project_ID_Selected ?>">
                <button class="w3-button w3-theme-d1 w3-margin-bottom" id="Select"  name="Select_Device"><i class="fa fa-search"></i> Select</button>
          </div>
          </form>
          <?php
          }
          ?>

          <form action="Manage-Action-Call-Screen.php" method="POST" enctype="multipart/form-data">
         
          <input type="text" name="Project_ID_Selected" class="form-control" hidden id="Re_Device"  value="<?php echo $Project_ID_Selected ?>">
          <input type="text" name="Device_ID_Selected" class="form-control" hidden id="Re_Device"  value="<?php echo $Dev_ID_Selected ?>">


              <div class="input-group mb-3" id="show" >
                  <button type="button"  class="w3-button w3-theme-d1 w3-margin-bottom"  data-toggle="modal" data-target="#Select-Serial" <?php if($Dev_Status_Select == "None") { ?> Disabled placeholder="อุปกรณ์ไม่มี Serial Number" <?php } else { ?> placeholder="โปรดระบุ Serial Number" <?php } ?>>Upload</button>
                  <input  class="form-control" type="text" name="Re_Serial" value="<?php echo $Ser_Serial_Second_Selected ?>" id="Re_Serial"   required="required"  <?php if($Dev_Status_Select == "None") { ?>  placeholder="อุปกรณ์ไม่มี Serial Number" <?php } else { ?> placeholder="โปรดเลือก Serial Number" <?php } ?>>
              </div>

              <script type="text/javascript">
            $(function() {
                $('#Re_Serial').keyup(function() {
                    this.value = this.value.toUpperCase();
                });
            });

          </script>

<div class="input-group mb-3">
              <textarea class="form-control" name="Re_Fail" rows="5" id="comment"  placeholder="ระบุอาการเสีย"></textarea>
          </div>
          	 
								<?php
								$Get_Site = "Select * From `call-site_tb` where Project_ID = '$Project_ID_Selected' order by CS_ID asc";
								$query_Site=mysqli_query($conn,$Get_Site);
								while ($data_Site=mysqli_fetch_array($query_Site))
								
								?>

          <div class="input-group mb-3">
                    <select name="CS_ID" class="form-control" required="required">
											<option value=<?php echo  $data_Site['CS_Name']; ?> >เลือกศูนย์</option>
											<?php
											$query_Si=mysqli_query($conn,$Get_Site);
											while ($data_Si=mysqli_fetch_array($query_Si)) {
												echo "<option value='".$data_Si['CS_ID']."'>" .$data_Si['CS_ID'].'-'.$data_Si['CS_Name'] ."</option>" ;
										?>
											<?php } ?>
										</select>

          </div>
          <div class="input-group mb-3">
              <input name="Re_Username" type="text" class="form-control" required="required" placeholder="ชื่อผู้แจ้งเรื่อง" value="">
          </div>
          <div class="input-group mb-3">
              <input name="Re_Tel" type="text" class="form-control" required="required" placeholder="เบอร์ติดต่อ" value="">
          </div>
          <div class="input-group mb-3">
              <input name="Re_Call_By" type="text" hidden class="form-control"  value="<?php echo  $ACC_F ; ?> ">
          </div>
          <div class="input-group mb-3">
          <h4>รูป 1 &nbsp;&nbsp;&nbsp; </h4>
                      <input type="file" name="Pic_A" class="w3-button  w3-theme-d1  w3-margin-bottom-sm" accept=".jpg,.jpeg,.png" onchange="validateFileType()">
                   </div>
                   <div class="input-group mb-3">
                   <h4>รูป 2 &nbsp;&nbsp;&nbsp; </h4>
                      <input type="file" name="Pic_B" class="w3-button  w3-theme-d1  w3-margin-bottom-sm" accept=".jpg,.jpeg,.png" onchange="validateFileType()">
                      </div>
                      <div class="input-group mb-3">
                      <h4>รูป 3 &nbsp;&nbsp;&nbsp; </h4>
                      <input type="file" name="Pic_C" class="w3-button  w3-theme-d1  w3-margin-bottom-sm" accept=".jpg,.jpeg,.png" onchange="validateFileType()">
                      </div>
                      <div class="input-group mb-3">
                      <h4> Video&nbsp; </h4>
                      <input type="file" name="Video_A" class="w3-button  w3-theme-d1  w3-margin-bottom-sm" accept="video/*" onchange="validateFileType()">
            
          </div>

          <script type="text/javascript">
    function validateFileType(){
        var fileName = document.getElementById("fileName").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
        }   
    }
</script>

<script type="text/javascript">
    function validateFile(){
        var fileName = document.getElementById("fileName").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="MP4"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
        }   
    }
</script>
          
          

          <div class="float-left">
            <button class="w3-button w3-theme-d1 w3-margin-bottom" name="Submit"><i class="fa fa-save"></i> Submit</button>
          </div>
          </form>

          <div class="float-right">
            <button class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-refresh"></i> Refresh</button> 
          </div>

          </p>
        </div>      
      </div>
      <br>
      <br>
      
 
      
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
        <h2 class="w3-opacity" align="center">ข้อมูลการแจ้งซ่อมรอ Verifly</h2>
       
        <hr class="w3-clear">
              <table width="100%" >
                    <thead>
                      <tr align="center">
                        <th width="15%">เลขงาน</th>
                        <th width="15%">โครงการ</th>
                        <th width="15%">วันเวลาที่แจ้ง</th>
                        <th width="15%">เวลาที่เหลือ</th>
                        <th width="15%">รายการ</th>
                        <th width="20%">S/N No.</th>
                        <th width="5%" colspan="2">Tool</th>
                      </tr>
                      </thead>
                    </div>
                      <?php 
                      $sql_Si="Select * from `call-device_tb`,`Call-Project_tb`,`repair_tb` where 
                      `repair_tb`.Project_ID = `Call-Project_tb`.Project_ID and 
                      `call-device_tb`.Dev_ID = `repair_tb`.Re_Device
                      ORDER BY Re_ID DESC";
                      $query_Si=mysqli_query($conn,$sql_Si);
                      $Num = 0;$i = 0;
                      while ($data_Si=mysqli_fetch_array($query_Si))                       
                      { 
                      $Num++;$i++;
                      $Re_Job = $data_Si["Re_Job"];
                      $Project_Name = $data_Si["Project_Name"];
                      $Re_DateCreate = $data_Si["Re_DateCreate"];
                      $Dev_Model = $data_Si["Dev_Model"];
                      $Project_SLA = $data_Si["Project_SLA"];
                      $GetTimeOut = $Project_SLA / 24;
                      $Re_Serial = $data_Si["Re_Serial"];

                      $ExpTime = explode('/',$Re_DateCreate);
                      $ExpDate= $ExpTime[0]+$GetTimeOut;
                      $ExpMonth = $ExpTime[1];
                      $ExpYear = $ExpTime[2]-543;

                      $ExpHour = explode(' ',$Re_DateCreate);
                      $ExpHour= $ExpHour[1];


                      $ConDate = $ExpMonth.'/'.$ExpDate.'/'.$ExpYear.' '.$ExpHour;
                      $ShowTime = $Re_Job;

                      $new_time = date("d/m/Y H:i:s", strtotime('-'.$Project_SLA.' hours', strtotime($ConDate)));
                      
                      $month = date('M', strtotime($ConDate));
                      $Day = date('d', strtotime($ConDate));
                      $Year = date('Y', strtotime($ConDate));
                      $Time = date('H:i:s', strtotime($ConDate));
                      $TimeStart = $month.' '.$Day.', '.$Year.' '.$Time;

                      $countDownDate = "countDownDate".$i;
                      $now = "now".$i;
                      $distance = "distance".$i;
                      $days = "days".$i;
                      $hours = "hours".$i;
                      $minutes = "minutes".$i;
                      $seconds = "seconds".$i;
                      $X = "X".$i;

                      ?>




                    <div class="tbl-content">
                    <tbody>
                      <tr >                      
                        <td align="left" style="font-size: 12px"><?php echo  $Re_Job; ?></td>
                        <td align="center" style="font-size: 12px"><?php echo $Project_Name;?></td>
                        <td align="center" style="font-size: 12px"><?php echo $new_time;?></td>
                        <td align="center" style="font-size: 12px"><h6 id="<?php echo $ShowTime ?>"></h6></td>

                        <td align="center" style="font-size: 12px"><?php echo $Dev_Model;?></td>

                        <td align="center" style="font-size: 12px"><?php echo $Re_Serial;?></td>
                        
<script>
// Set the date we're counting down to
var <?php echo  $countDownDate ?> = new Date('<?php echo $TimeStart ?>').getTime();
// var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
var <?php echo  $X ?> = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var <?php echo  $distance ?> = <?php echo  $countDownDate ?> - now;
    
  // Time calculations for days, hours, minutes and seconds
  var <?php echo  $hours ?> = Math.floor(<?php echo  $distance ?> / (1000 * 60 * 60 ));
  // var <?php echo  $hours ?> = Math.floor((<?php echo  $distance ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var <?php echo  $minutes ?> = Math.floor((<?php echo  $distance ?> % (1000 * 60 * 60)) / (1000 * 60));
  var <?php echo  $seconds ?> = Math.floor((<?php echo  $distance ?> % (1000 * 60)) / 1000);
  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  // var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  // document.getElementById("<?php echo $ShowTime ?>").innerHTML = days + "วัน " + hours + "ชั่วโมง "
  // + minutes + "นาที " + seconds + " ";
    
  // If the count down is over, write some text 
  if(<?php echo $hours ?> > 0)
                          {
                            document.getElementById("<?php echo $ShowTime ?>").innerHTML = <?php echo $hours ?> + ":"
                            + <?php echo $minutes ?>+ ":" + <?php echo $seconds ?> +" ชม.";
                            if (<?php echo $hours ?> > 10 )
                            {
                            document.getElementById("<?php echo $ShowTime ?>").style.color="green"; 
                            }       
                            else if(<?php echo $hours ?> < 5 )
                            {
                              document.getElementById("<?php echo $ShowTime ?>").style.color="red"; 
                            }
                            else
                            {
                              document.getElementById("<?php echo $ShowTime ?>").style.color="orange"; 
                            }
                           
                          }
                          else
                          {
                            document.getElementById("<?php echo $ShowTime ?>").innerHTML = "Out Of SLA"; 
                            document.getElementById("<?php echo $ShowTime ?>").style.color="red";
                          }
                          
                           
                        }, 1000);
</script>

               

                        <form action="Management-Edit-Call-Screen-Project.php" method="POST">
                        <input type="text" hidden  id="Project_IDX" name="Project_IDX" value="<?php echo $Project_IDX ?>"></p>
                        <td align="center" style="font-size: 12px">
                          <button <?php if($Acc_NameX=="Admin-System"){ ?> hidden <?php } ?> class="btn" name="Select"><i class="fa fa-pencil" ></i></button>
                        </td>
                        </form>

                        <form action="Manage-Call-Screen.php" method="POST">
                          
                        <input type="text" hidden  id="Re_Job" name="Re_Job" value="<?php echo $Re_Job ?>"></p>
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







<?php include('Navbar/Modal/Modal_Serial.php'); ?>

</body>
</html> 