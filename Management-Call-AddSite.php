

<?php 
include('Connect.php');


if($_SESSION['Acc_ID'])
{
	$Acc_ID = $_SESSION['Acc_ID'];
}

$result_ACC=mysqli_query($conn, "SELECT * FROM Account_tb WHERE Acc_ID='$Acc_ID'")or die('Error In Session');
$ACC_Result=mysqli_fetch_array($result_ACC);
$Acc_Name = $ACC_Result['Acc_Name'];
$Acc_Status = $ACC_Result['Acc_Status'];


if(isset($_POST['Import']))
{
  $_SESSION['Dev_ID']= $_POST['Dev_ID'];
  
  
}
$Project_IDX = $_SESSION['Project_IDX'];



$result_Pro=mysqli_query($conn, "SELECT * FROM brand_tb,type_tb,`call-device_tb` WHERE  
brand_tb.Brand_ID = `call-device_tb`.Brand_ID and
type_tb.Type_ID = `call-device_tb`.Type_ID and
`call-device_tb`.Project_ID = `call-device_tb`.Project_ID and `call-device_tb`.Dev_ID='$Dev_ID'
")or die('Error In Session');
$Pro_Result=mysqli_fetch_array($result_Pro);
$Dev_Model = $Pro_Result['Dev_Model'];
$Brand_Logo = $Pro_Result['Brand_Logo'];
$Brand_Name = $Pro_Result['Brand_Name'];
$Type_Name = $Pro_Result['Type_Name'];




if(isset($_POST['Save'])==true)
{
  
    $Ser_Box = $_POST['Ser_Box'];
    $Ser_Serial = $_POST['Ser_Serial'];
    $Ser_Status = $_POST['Ser_Status'];
    $Dev_ID = $_POST['Dev_ID'];
    $Date_Create = $_POST['Date_Create'];

    if($Date_Create == "")
    {
      $Set_Date = date("d/m/Y",strtotime("+543 years"));
    }
    else
    {
      $Fig_Date = explode('-',$Date_Create);
      $Year=$Fig_Date[0];
      $Day=$Fig_Date[1];
      $Month=$Fig_Date[2];
      
      $Set_Date=$Day.'/'.$Month.'/'.$Year;

    }

    


    foreach($Ser_Box as $Ser_Box => $Ser_Box)
    {
      $Ser_BoxX = $Ser_Box+1;
      $Ser_SerialX = $Ser_Serial[$Ser_Box];
      $Ser_StatusX = $Ser_Status[$Ser_Box];
      $Dev_IDX = $Dev_ID[$Ser_Box];
      $Ser_BoxX = sprintf("%04d", $Ser_BoxX);
      $Ser_IDX = $Dev_IDX.'-'.$Ser_BoxX;

      
      

      $SQL_Add_Ser ="INSERT INTO `call-serial_tb` (`Ser_ID`,`Ser_Box`,`Ser_Serial_First`,`Ser_Serial_Second`,`Ser_Status`,`Ser_Remark`,`Ser_Unit`,`Ser_DateImport`,`Ser_Withdraw`,`Dev_ID`,`Ser_SN`)
       VALUES ('$Ser_IDX', '$Ser_BoxX','$Ser_SerialX','$Ser_SerialX','$Ser_StatusX','-','1','$Set_Date','สร้างรายการโครงการ','$Dev_IDX','Fix')";
      if ($conn->query($SQL_Add_Ser)==TRUE) 
      {
        echo "
        <script src='https://code.jquery.com/jquery-3.6.4.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
          $(document).ready(function(){
            Swal.fire({
              title:'Import Serial Number To Call Screen Project Complete !',
              icon: 'success',
              timer: 5000,
              showConfirmButton: false
            });
          });
          </script>";
        
          header("refresh:2; url=Management-Call-Screen.php");
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
        <h4 class="w3-opacity" align="center">เพิ่มสถานที่ <?php echo $Project_Name.' '.$Project_No ?> </h4>
          <hr>
                   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.0/dist/xlsx.full.min.js"></script>
     
   
    <div class="form-group">
       
      </div>
      <form action="Management-Add-Site-Call.php" method="POST">
        <div style="float:left"> <input id="fileupload" type=file name="files[]"></div><br>
        <hr>
      
      <table id="tblItems" class="table w3-table-all w3-hoverable">
        <thead align="center">
          <tr >
            <th width="10%">ชื่อสถานที่</th>
            <th width="15%">ชื่อสถานที่</th>
            <th width="15%">ที่อยู่</th>
            <th width="20%">แขวง/ตำบล</th>
            <th width="20%">เขต/อำเภอ</th>
            <th width="20%">จังหวัด</th>
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
                            <td><input type="text" class="form-control" name="Ser_Status[]" value="${columns[2]}">
                            <td><input type="text" class="form-control" name="Ser_Status[]" value="${columns[3]}">
                            <td><input type="text" class="form-control" name="Ser_Status[]" value="${columns[4]}">
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
