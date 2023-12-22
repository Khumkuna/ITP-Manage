<?php

include('Connect.php');


// date_default_timezone_set("Asia/Bangkok");
// $servername = "localhost";
// $username = "root";
// $password = "Root123;";
$database = "invent_db";



$tables = array();

$result = mysqli_query($conn,"SHOW TABLES");
while ($row = mysqli_fetch_row($result)) {
	$tables[] = $row[0];
}

$return = '';

foreach ($tables as $table) {
	$result = mysqli_query($conn, "SELECT * FROM ".$table);
	$num_fields = mysqli_num_fields($result);

	$return .= 'DROP TABLE '.$table.';';
	$row2 = mysqli_fetch_row(mysqli_query($conn, 'SHOW CREATE TABLE '.$table));
	$return .= "\n\n".$row2[1].";\n\n";

	for ($i=0; $i < $num_fields; $i++) { 
		while ($row = mysqli_fetch_row($result)) {
			$return .= 'INSERT INTO '.$table.' VALUES(';
			for ($j=0; $j < $num_fields; $j++) { 
				$row[$j] = addslashes($row[$j]);
				if (isset($row[$j])) {
					$return .= '"'.$row[$j].'"';} else { $return .= '""';}
					if($j<$num_fields-1){ $return .= ','; }
				}
				$return .= ");\n";
			}
		}
		$return .= "\n\n\n";
	
}

$Namefile = $database.'-'.date('YmdHis');
$handle = fopen($Namefile.'.sql', 'w+');
fwrite($handle, $return);
fclose($handle);
$Savefile = $Namefile.'.sql';

$source_file = $Savefile;
$destination_path = 'Database/';
rename($source_file, $destination_path . pathinfo($source_file, PATHINFO_BASENAME));



?>