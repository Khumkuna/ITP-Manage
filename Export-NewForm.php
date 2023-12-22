<?php
$GetDate="New-Form(Site)";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$GetDate.xls");
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize("$GetDate.xls"));   

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
<table border="1">
    <tr>
        <th>ชื่อสถานที่</th>
        <th>ที่อยู่</th>
        <th>แขวง/ตำบล</th>
        <th>เขต/อำเภอ</th>
        <th>จังหวัด</th>
    </tr>
    <?php 
    for($i=0;$i<=10;$i++)
    { 
        ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php 
    }
  ?>
</table>
</body>
</html>
