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


if(isset($_POST['Import']))
{
  $_SESSION['DEPD_ID']= $_POST['DEPD_ID'];
}
$DEPD_ID = $_SESSION['DEPD_ID'];

$result_Pro=mysqli_query($conn, "SELECT * FROM brand_tb,type_tb,deposit_tb,deposit_detail_tb WHERE  
brand_tb.Brand_ID = deposit_detail_tb.Brand_ID and
type_tb.Type_ID = deposit_detail_tb.Type_ID and
deposit_tb.Dep_ID = deposit_detail_tb.Dep_ID and deposit_detail_tb.DEPD_ID='$DEPD_ID'")or die('Error In Session');
$Pro_Result=mysqli_fetch_array($result_Pro);
$DEPD_Model = $Pro_Result['DEPD_Model'];
$Brand_Logo = $Pro_Result['Brand_Logo'];
$Brand_Name = $Pro_Result['Brand_Name'];
$Type_Name = $Pro_Result['Type_Name'];




if(isset($_POST['Save'])==true)
{
    $Acc_IDX = $_POST['Acc_ID'];
    $SD_NoX = $_POST['SD_No'];
    $Ser_Box = $_POST['Ser_Box'];
    $Ser_Serial = $_POST['Ser_Serial'];
    $Ser_Status = $_POST['Ser_Status'];
    $DEPD_ID = $_POST['DEPD_ID'];
    $Date_Create = $_POST['Date_Create'];

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

    


    foreach($Ser_Box as $Ser_Box => $Ser_Box)
    {
      $Ser_BoxX = $Ser_Box+1;
      $Ser_SerialX = $Ser_Serial[$Ser_Box];
      $Ser_StatusX = $Ser_Status[$Ser_Box];
      $Dev_IDX = $Dev_ID[$Ser_Box];
      $Ser_BoxX = sprintf("%04d", $Ser_BoxX);

      $DEPD_IDX = $DEPD_ID[$Ser_Box];

      $Ser_IDX = $DEPD_IDX.'-'.$Ser_BoxX;


      $SQL_Add_Ser ="INSERT INTO `serial_deposit_tb` (`SD_ID`,`SD_No`,`SD_Serial`,`SD_QTY`,`SD_CerIN`,`SD_CerOut`,`SD_Remark`,`DEPD_ID`)
       VALUES ('$Ser_IDX', '$Ser_BoxX', '$Ser_SerialX','1','$SD_NoX','-','-','$DEPD_IDX')";
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
            VALUES ('$DR_IDX', '$SD_NoX', '$Set_Date','1',NULL,'-','$Ser_IDX','-','$Acc_IDX','$DEPD_IDX')";
            if ($conn->query($SQL_Add_Rec)==TRUE) 
            {
              echo '<script type="text/javascript">';
              echo 'alert("Import File รายการฝากอุปกรณ์เรียบร้อยแล้ว");';
              echo 'window.location.href = "Management-Deposit-Serial-Number.php";';
              echo '</script>';
            }
      }


      

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


<script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js">  
    </script>  
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"> </script>  
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"> </script>  
    <script src = "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">  
    </script>  
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">  
    <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">  
    </script>  
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">  
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">  
    </script>  



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

#yourBtn {
  position: relative;
 
  font-family: calibri;
  width: 150px;
  padding: 10px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border: 1px dashed #BBB;
  text-align: center;
  background-color: #DDD;
  cursor: pointer;
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
        <div class="w3-container"><br>
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
      <script>
        function getFile() {
                document.getElementById("upfile").click();
              }

              function sub(obj) {
                var file = obj.value;
                var fileName = file.split("\\");
                document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
                document.myForm.submit();
                event.preventDefault();
              }
        </script>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h4 class="w3-opacity" align="center">การ Import File รายการฝากอุปกรณ์ <?php echo $Project_Name.' '.$Project_No ?> </h4>
        <h5 class="w3-opacity" align="left"><img src="<?php echo $Brand_Logo ?>" style="width:30px" ><?php echo ' '.$Type_Name.'-'.$DEPD_Model ?></h5>
          <hr>

                   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.0/dist/xlsx.full.min.js"></script>
     
   
    <div class="form-group">
       
      </div>
      <form action="Management-Add-Serial-Deposit.php" method="POST">
      <p><input type="hidden" class="form-control" placeholder="เลขที่เอกสารฝาก" id="Acc_ID" name="Acc_ID" value="<?php echo $Acc_IDX ?>" required="required"></p>
      <p><input type="text" class="form-control" placeholder="เลขที่เอกสารฝาก" id="SD_No" name="SD_No" value="" required="required"></p>

        <div style="float:left"> <input id="fileupload" type=file name="files[]"></div>
        <div style="float:right"> <input type="date" class="form-control"  name="Date_Create" value=""> </div><br>
        <hr>

      
      <table id="tblItems" class="table w3-table-all w3-hoverable">
        <thead align="center">
          <tr >
            <th width="15%">No</th>
            <th width="85%">Serial Number</th>
          </tr>
        </thead>
        <tbody></tbody>

      
    </table>

        <button type="Submit" class="btn btn-success btn-block" name="Save"><i class="fa fa-pencil"></i> Save</button>
    </form>



    <script>  
var ExcelToJSON = function() {
  this.parseExcel = function(file) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var data = e.target.result;
      var workbook = XLSX.read(data, {
        type: 'binary'
      });
      workbook.SheetNames.forEach(function(sheetName) {
        var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
        var productList = JSON.parse(JSON.stringify(XL_row_object));

        var rows = $('#tblItems tbody');
        // console.log(productList)
        for (i = 0; i < productList.length; i++) {
          var columns = Object.values(productList[i])
          rows.append(`
                        <tr>
                            <td><input type="text" class="form-control" name="Ser_Box[]" value="${columns[0]}"></td>
                            <td><input type="text" class="form-control" name="Ser_Serial[]" value="${columns[1]}"></td>
                            <input type="hidden" class="form-control" name="DEPD_ID[]" value="<?php echo $DEPD_ID ?>">
                            </td>
                        </tr>
                    `);
        }

      })
    };
    reader.onerror = function(ex) {
      console.log(ex);
    };

    reader.readAsBinaryString(file);
  };
};

function handleFileSelect(evt) {
  var files = evt.target.files; // FileList object
  var xl2json = new ExcelToJSON();
  xl2json.parseExcel(files[0]);
}

    document.getElementById('fileupload').addEventListener('change', handleFileSelect, false); 
    </script>  
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
