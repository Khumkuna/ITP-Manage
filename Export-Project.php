<?php
include('Connect.php');

$_SESSION['Dev_ID'] = $_POST['Dev_ID'];
$Dev_ID = $_SESSION['Dev_ID'];


$result_Pro=mysqli_query($conn, "SELECT * FROM project_tb,Brand_tb,type_tb,device_tb WHERE
project_tb.Project_ID = device_tb.Project_ID and
Brand_tb.Brand_ID = device_tb.Brand_ID and
type_tb.Type_ID = device_tb.Type_ID and
device_tb.Dev_ID='$Dev_ID'")or die('Error In Session');
$Pro_Result=mysqli_fetch_array($result_Pro);
$Project_Name = $Pro_Result['Project_Name'];
$Project_No = $Pro_Result['Project_No'];
$Brand_Logo = $Pro_Result['Brand_Logo'];
$Dev_Model = $Pro_Result['Dev_Model'];

$Type_Name = $Pro_Result['Type_Name'];

$NameEX = $Project_Name.'-'.$Dev_Model.' ('.date('Y-m-d').'-Export)';


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$NameEX.xls");
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize("$NameEX.xls"));   

@readfile($filename);  




?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table border="1" width="100%">
    <tr>
        <th width="20%">Box</th>
        <th width="60%">Serial-Number</th>
        <th width="20%">Status</th>
    </tr>
    <?php
        $sql_EXP="SELECT * FROM serial_tb where Dev_ID = '$Dev_ID'";
		$query_EXP=mysqli_query($conn,$sql_EXP);
		while ($data_EXP=mysqli_fetch_array($query_EXP)) 
		{

            $Ser_Box = $data_EXP['Ser_Box'];
            $Ser_Serial_Second = $data_EXP['Ser_Serial_Second'];
            $Ser_Status = $data_EXP['Ser_Status'];
    ?>

    <tr>
        <td align="center"><?php echo $Ser_Box ?></td>
        <td align="center"><?php echo $Ser_Serial_Second ?></td>
        <td align="center"><?php echo $Ser_Status ?></td>
    </tr>
    <?php 
        } 
    ?>
</table>

</body>
</html>