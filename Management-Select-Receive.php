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


if(isset($_POST['Next']))
{
  $_SESSION['Receive_No']= $_POST['Receive_No'];
  $_SESSION['Sub_ID']= $_POST['Sub_ID'];
  $_SESSION['Receive_Date']= $_POST['Receive_Date'];
  $_SESSION['Receive_Remark']= $_POST['Receive_Remark'];

  $ChechNo = $_POST['Receive_No'];

  $result_Checked=mysqli_query($conn, "SELECT * FROM receive_tb WHERE Rec_No='$ChechNo'")or die('Error In Session');
  $Checked_Result=mysqli_fetch_array($result_Checked);
  $Rec_No = $Checked_Result['Rec_No'];

  if($Rec_No !="")
  {
    echo '<script type="text/javascript">';
    echo 'alert("เลขที่เอกสารซ้ำโปรดตรวจสอบ");';
    echo 'window.location.href = "Management-Create-Receive.php";';
    echo '</script>';
  }


  
  
}
$Receive_Remark = $_SESSION['Receive_Remark'];
$Receive_No = $_SESSION['Receive_No'];
$Sub_ID = $_SESSION['Sub_ID'];
$Receive_Date = $_SESSION['Receive_Date'];

$result_Pro=mysqli_query($conn, "SELECT * FROM Project_tb WHERE Project_ID='$Project_IDX'")or die('Error In Session');
$Pro_Result=mysqli_fetch_array($result_Pro);
$Project_Name = $Pro_Result['Project_Name'];
$Project_No = $Pro_Result['Project_No'];



if(isset($_POST['Savenone']))
{

  $Ser_Unit = $_POST['Ser_Unit'];
  $Dev_IDX = $_POST['Dev_IDX'];
  $Dev_NameX = $_POST['Dev_NameX'];
  $Date_Create = $_POST['Date_Create'];

  $Fig_Date = explode('-',$Date_Create);
  $Year=$Fig_Date[0];
  $Day=$Fig_Date[1];
  $Month=$Fig_Date[2];
  
  $Set_Date=$Day.'/'.$Month.'/'.$Year;

  $Ser_IDX = $Dev_IDX.'-0001';

  $SQL_Add_Ser ="INSERT INTO `serial_tb` (`Ser_ID`,`Ser_Box`,`Ser_Serial_First`,`Ser_Status`,`Ser_Remark`,`Ser_Unit`,`Ser_DateImport`,`Dev_ID`)
  VALUES ('$Ser_IDX', '001','$Dev_NameX','ปกติ','-','$Ser_Unit','$Set_Date','$Dev_IDX')";
 if ($conn->query($SQL_Add_Ser)==TRUE) 
 {
   echo '<script type="text/javascript">';
   echo 'alert("Import File เรียบร้อยแล้ว");';
   echo 'window.location.href = "Management-Serial-Number.php";';
   echo '</script>';
 }




}


if(isset($_POST['BrandDelete']))
{
  $Brand_ID= $_POST['Brand_ID'];

  $SQL_Brand = "DELETE FROM Brand_tb WHERE Brand_ID ='$Brand_ID';";
          if ($conn->query($SQL_Brand)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Serial-Number.php";';
            echo '</script>';
          }
}


if(isset($_POST['TypeDelete']))
{
  $Type_ID= $_POST['Type_ID'];

  $SQL_Type = "DELETE FROM Type_tb WHERE Type_ID ='$Type_ID';";
          if ($conn->query($SQL_Type)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "Management-Serial-Number.php";';
            echo '</script>';
          }
}








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
      <h4 class="w3-opacity" align="center">ข้อมูลการรับคืน </h4></p>

<form action="Management-Preview-Receive.php" method="POST">
      <table width="100%">
        
        <tr>
          <td width="50%"> <h5 class="w3-opacity" align="left">เลขที่เอกสาร: <?php echo $Receive_No ?> </h5></td>
          <td width="50%"> <h5 class="w3-opacity" align="left">วันที่รับคืน: <?php echo $Receive_Date ?> </h5></td>
        </tr>
        <tr>
          <td colspan="2"> <h5 class="w3-opacity" align="left">ชื่อผู้รับ: <?php echo $Sub_ID?> </h5></td>
        </tr>
        <tr>
          <td colspan="2"> <h5 class="w3-opacity" align="left">หมายเหตุ: <?php echo $Receive_Remark?> </h5></td>
        </tr>
      </table>   

        <hr class="w3-clear">

        <?php
        $sql_Count="Select * from project_tb";
        $query_Count=mysqli_query($conn,$sql_Count);
        $Count = 0; $SerT = 0;
        while ($data_Count=mysqli_fetch_array($query_Count))                       
        { $Count++; $SerT++;
          $Project_ID = $data_Count['Project_ID'];
          $Project_Name = $data_Count['Project_Name'];
          $Project_No = $data_Count['Project_No'];
        ?>

        <a onclick="myFunction('<?php echo $Count ?>')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus-square-o fa-fw w3-margin-right"></i> <?php echo $Project_Name.' ('.$Project_No.') '?></a>
                          <div id="<?php echo $Count ?>" class="w3-hide w3-container">
                          <?php
                            $sql_GetPro="Select * from device_tb where Project_ID ='$Project_ID'";
                            $query_GetPro=mysqli_query($conn,$sql_GetPro);
                            while ($data_GetPro=mysqli_fetch_array($query_GetPro))                       
                            { 
                              $Dev_ID = $data_GetPro['Dev_ID'];
                              $Dev_Model = $data_GetPro['Dev_Model'];
                                ?>
                                <a onclick="myFunction('<?php echo $Dev_ID ?>')" class="w3-button w3-block w3-theme-l4 w3-left-align"><i class="fa fa-plus-square-o fa-fw w3-margin-right"></i> <?php echo $Dev_Model ?></a>
                                <div id="<?php echo $Dev_ID ?>" class="w3-hide w3-container">
                                <table width="100%">
                                              <tr>
                                              <thead>
                                                <th width="10%">Select</th>
                                                <th width="10%">Box</th>
                                                <th width="50%">Serial Number</th>
                                                <th width="30%">Status</th>
                                              </thead>
                                              </tr>
                                        <?php
                                        $sql_GetSerial="Select * from serial_tb where Dev_ID ='$Dev_ID' and Ser_Out >=1";
                                        $query_GetSerial=mysqli_query($conn,$sql_GetSerial);
                                        while ($data_GetSerial=mysqli_fetch_array($query_GetSerial))                       
                                        { 
                                          $Ser_ID = $data_GetSerial['Ser_ID'];
                                          $Ser_Box = $data_GetSerial['Ser_Box'];
                                          $Ser_Serial_First = $data_GetSerial['Ser_Serial_First'];
                                          $Ser_Status = $data_GetSerial['Ser_Status'];
                                          $Ser_SN= $data_GetSerial['Ser_SN'];
                                          $Ser_Unit = $data_GetSerial['Ser_Unit'];
                                          $Ser_Out= $data_GetSerial['Ser_Out'];
                                          $Total = $Ser_Unit -  $Ser_Out;
                                          $Ser_Withdraw = $data_GetSerial['Ser_Withdraw'];
                                           
                                                                               
                                          ?>

                                              <tr>
                                                <td align="left"><input type="checkbox"  name="Ser_ID[]" value="<?php echo $Ser_ID ?>">
                                                </td>
                                                <td><?php echo $Ser_Box ?></td>
                                                <td><?php echo $Ser_Serial_First ?></td>
                                                
                                                <td><?php echo $Ser_Status ?></td>
                                              </tr>

                                              <?php } ?>
                                            </table>
                                </div>

                                <?php }
                                ?>


                            
                          </div>

       <?php 
        }
        ?><br>
    <input type="text" hidden name="Receive_No" value="<?php echo $Receive_No ?>">
    <input type="text" hidden name="Sub_ID" value="<?php echo $Sub_ID ?>">
    <input type="text" hidden name="Receive_Date" value="<?php echo $Receive_Date ?>">
    <input type="text" hidden name="Receive_Remark" value="<?php echo $Receive_Remark ?>">
    <button class="btn btn-info btn-block" name="Next">Next Step <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></button>
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


<script type="text/javascript">
function submitform()
{
  document.myform.submit();
}
</script>
