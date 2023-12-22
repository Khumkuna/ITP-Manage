<?php 
include('Connect.php');


if($_SESSION['Acc_ID'])
{
	$Acc_ID = $_SESSION['Acc_ID'];
}


$result_ACC=mysqli_query($conn, "SELECT * FROM Account_tb WHERE Acc_ID='$Acc_ID'")or die('Error In Session');
$ACC_Result=mysqli_fetch_array($result_ACC);
$Acc_IDX = $ACC_Result['Acc_ID'];
$Acc_Name = $ACC_Result['Acc_Name'];
$Acc_Status = $ACC_Result['Acc_Status'];


if(isset($_POST['Unit']))
{
 

  $_SESSION['Dep_IDX']= $_POST['Dep_IDX'];
  
  
}
$Dep_IDX = $_SESSION['Dep_IDX'];

$result_Pro=mysqli_query($conn, "SELECT * FROM deposit_tb WHERE Dep_ID='$Dep_IDX'")or die('Error In Session');
$Pro_Result=mysqli_fetch_array($result_Pro);
$Dep_Name = $Pro_Result['Dep_Name'];
$Dep_Tel = $Pro_Result['Dep_Tel'];



if(isset($_POST['Savenone']))
{

  $SD_QTY = $_POST['SD_QTY'];
  $DEPD_IDX = $_POST['DEPD_IDX'];
  $DEPD_ModelX = $_POST['DEPD_ModelX'];
  $Date_Create = $_POST['Date_Create'];
  $SD_No = $_POST['SD_No'];

  if($Date_Create == "")
  {
    $Set_Date = date("d/m/Y",strtotime("+543 years"));
  }
  else
  {
    $Fig_Date = explode('-',$Date_Create);
    $Month=$Fig_Date[1];
    $Day=$Fig_Date[2];
    $Year=$Fig_Date[0]+543;
    
    $Set_Date=$Day.'/'.$Month.'/'.$Year;

  }

  $DEPD_IDZ = $DEPD_IDX.'-0001';

  $SQL_Add_Ser ="INSERT INTO `serial_deposit_tb` (`SD_ID`,`SD_Serial`,`SD_QTY`,`SD_CerIN`,`SD_CerOut`,`SD_Remark`,`DEPD_ID`)
  VALUES ('$DEPD_IDZ', 'DEPD_ModelX','$SD_QTY','$SD_No','-','-','$DEPD_IDX')";
 if ($conn->query($SQL_Add_Ser)==TRUE) 
 {

        $Check_ID = "Select * From deposit_receive_tb ORDER BY DR_ID DESC LIMIT 1";
        $result_Check_ID =mysqli_query($conn,$Check_ID);
        $row_Check_ID =mysqli_fetch_array($result_Check_ID);
        $Last_id = $row_Check_ID['DR_ID'];
        $Rest = substr($Last_id, -3);
        $Insert_id = $Rest + 1;
        $ars = sprintf("%06d", $Insert_id);
        $ref = "Rec-";
        $DR_IDX = $ref.''.$ars;

            $SQL_Add_Rec ="INSERT INTO `deposit_receive_tb` (`DR_ID`,`DR_No`,`DR_Date`,`DR_Unit`,`DR_Type`,`DR_Remark`,`SD_ID`,`Dep_ID`,`ACC_ID`,`DEPD_ID`)
            VALUES ('$DR_IDX', '$SD_No', '$Set_Date','$SD_QTY',NULL,'-','$DEPD_IDZ','-','$Acc_IDX','$DEPD_IDX')";
            if ($conn->query($SQL_Add_Rec)==TRUE) 
            {
              echo '<script type="text/javascript">';
              echo 'alert("เพิ่มรายการ '.$DEPD_ModelX.' จำนวน '.$SD_QTY.' เรียบร้อย");';
              echo 'window.location.href = "Management-Deposit-Serial-Number.php";';
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
        <h4 class="w3-opacity" align="center">ข้อมูลการฝากอุปกรณ์</h4>
        <h5 class="w3-opacity" align="left">ชื่อ: <?php echo $Dep_Name ?></h5>

       

       
        <hr class="w3-clear">

        <?php
        $sql_Count="Select * from brand_tb,type_tb,deposit_detail_tb where deposit_detail_tb.brand_ID = brand_tb.brand_ID
        and deposit_detail_tb.Type_ID = type_tb.Type_ID and deposit_detail_tb.Dep_ID = '$Dep_IDX'";
        $query_Count=mysqli_query($conn,$sql_Count);
        $Count = 0;
        while ($data_Count=mysqli_fetch_array($query_Count))                       
        { $Count++;
            $Brand_Name = $data_Count['Brand_Name'];
            $Brand_Logo = $data_Count['Brand_Logo'];
            $Type_Name = $data_Count['Type_Name'];
            $DEPD_Model = $data_Count['DEPD_Model'];
            $DEPD_ID = $data_Count['DEPD_ID'];
            
            $DEPD_Type = $data_Count['DEPD_Type'];
            if($DEPD_Type == "Fix"){ $Get_Type = "  (ระบุ Serial Number)"; }else{$Get_Type = "  (ไม่ระบุ Serial Number)";}




            $SQL_CheckSerial=mysqli_query($conn, "SELECT * FROM serial_deposit_tb WHERE DEPD_ID ='$DEPD_ID'")or die('Error In Session');
            $CheckSerial_Result=mysqli_fetch_array($SQL_CheckSerial);
            $CheckSerial_ID = $CheckSerial_Result['DEPD_ID'];


        ?>

        <?php 
        if($DEPD_Type == "Fix")
        {
       
                    if($CheckSerial_ID == '')
                    {
                    ?>
                        <button onclick="myFunction('<?php echo $Count ?>')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus-square-o fa-fw w3-margin-right"></i> <?php echo $Brand_Name.' '.$Type_Name.'-'.$DEPD_Model?><?php echo $Get_Type ?></button>
                          <div id="<?php echo $Count ?>" class="w3-hide w3-container">
                              <form action="Management-Add-Serial-Deposit.php" method="POST">
                                    <input tyle="text" hidden name="DEPD_ID" value="<?php echo $DEPD_ID ?>"> 
                                    <button name="Import" class="w3-button w3-block w3-theme-l2 w3-left-align"><i class="fa fa-file-excel-o fa-fw w3-margin-right"></i>Import File</button>
                                </form>
                                <!-- <form action="Management-Add-Serial.php" method="POST">
                                    <input tyle="text" hidden name="Dev_ID" value="<?php echo $Dev_ID ?>"> 
                                    <button name="Import" class="w3-button w3-block w3-theme-l2 w3-left-align"><i class="fa fa-plus fa-fw w3-margin-right"></i>เพิ่มทีละ Row</button>
                                </form> -->
                          </div>
                          <?php 
                      }
                      else
                      {
                        ?>
                        <button onclick="myFunction('<?php echo $Count ?>')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus-square-o fa-fw w3-margin-right"></i> <?php echo $Brand_Name.' '.$Type_Name.'-'.$DEPD_Model?><?php echo $Get_Type ?></button>
                          <div id="<?php echo $Count ?>" class="w3-hide w3-container">
                              <table width="100%">
                                <thead>
                                  <tr align="center">
                                    <th width="15%">Box</th>
                                    <th width="85%">Serial-Number</th>
                                  </tr>
                                </thead>
                                <?php 
                                      $sql_Table="Select * from serial_deposit_tb where DEPD_ID = '$CheckSerial_ID'";
                                      $query_Table=mysqli_query($conn,$sql_Table);
                                      while ($data_Table=mysqli_fetch_array($query_Table))                       
                                      { 

                                        $SD_No = $data_Table['SD_No'];
                                        $SD_Serial = $data_Table['SD_Serial'];
                                        $Ser_Status = $data_Table['Ser_Status'];
                                        $Ser_DateImport = $data_Table['Ser_DateImport'];

                                        ?>
                                        <tbody>
                                          <tr>
                                            <td><input type="text" disabled class="form-control" value="<?php echo $SD_No ?>" ></td>
                                            <td><input type="text" disabled class="form-control" value="<?php echo $SD_Serial ?>" ></td>
                                          </tr>
                                        
                                        </tbody>
                                        <?php
                                        }
                                        ?>
                                      </table><br>



                          </div>
                        <?php
                        }
          }
          else
          {
            if($CheckSerial_ID =="")
            {
            ?>
              <button onclick="myFunction('<?php echo $Count ?>')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus-square-o fa-fw w3-margin-right"></i> <?php echo $Brand_Name.' '.$Type_Name.'-'.$DEPD_Model?><?php echo $Get_Type ?></button>
                          <div id="<?php echo $Count ?>" class="w3-hide w3-container"><br>
                               <h5 class="w3-opacity" align="left"><img src="<?php echo $Brand_Logo ?>" style="width:30px" ><?php echo ' '.$Type_Name.'-'.$DEPD_Model ?></h5>
                                 <hr>
                                 <form action="Management-Deposit-Serial-Number.php" method="POST">
                                    <input type="hidden" class="form-control" name="DEPD_IDX" value="<?php echo $DEPD_ID ?>">
                                    <input type="hidden" class="form-control"  id="DEPD_ModelX" name="DEPD_ModelX" value="<?php echo $Brand_Name.'-'.$DEPD_Model?>">
                                    <p>
                                    <input type="text" class="form-control" placeholder="เลขที่เอกสารฝาก" id="SD_No" name="SD_No" value="" required="required"></p>

                                    <p><input type="number" class="form-control" placeholder="ระบุจำนวนอุปกรณ์" id="SD_QTY" name="SD_QTY" value="" required="required"></p>
                                    

                                    <p><input type="date" class="form-control" name="Date_Create" value="" required="required"></p>

                                    <hr>
                                    <button type="Submit" class="btn btn-success btn-block" name="Savenone"><i class="fa fa-pencil"></i> Save</button>
                                  </form><br>
                              </div>

                            <?php 
                            }
                            else
                            { 
                                    $CheckSD_QTY = $CheckSerial_Result['SD_QTY'];
                              ?>


                                  <button onclick="myFunction('<?php echo $Count ?>')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus-square-o fa-fw w3-margin-right"></i> <?php echo $Brand_Name.' '.$Type_Name.'-'.$DEPD_Model?><?php echo $Get_Type ?></button>
                                            <div id="<?php echo $Count ?>" class="w3-hide w3-container"><br>

                                            <table width="100%">
                                              <tr>
                                                <td width="60%">
                                                        <h5 class="w3-opacity" align="left"><img src="<?php echo $Brand_Logo ?>" style="width:30px" ><?php echo ' '.$Type_Name.'-'.$DEPD_Model ?></h5>
                                                </td>
                                                <td width="40%" align="right"><h5><?php echo 'จำนวน '.$CheckSD_QTY.'  Unit' ?></h5>
                                        

                                                </td>
                                              </tr>
                                            </table>
                                          </div>
                      <?php }
                }
                ?>
            <?php 
        } ?>



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

<div class="footer">
<!-- Footer -->
<!-- <footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5" align="center"><br>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Prachya Khumkuna</a></p>
</footer> -->

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


<script>
var nextI = $("input").index(this)+1,
      next=$("input").eq(nextI);
next.focus();
  </script>
