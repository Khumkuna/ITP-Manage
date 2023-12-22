<?php 
// Get search term 
$searchTerm = $_GET['term']; 
 
// Fetch matched data from the database 

$Get_Site = "Select * From `call-serial_tb` where Ser_Serial_Second LIKE '%$searchTerm'";
$query_Site=mysqli_query($conn,$Get_Site);

// $query = $conn->query("SELECT * FROM `call-serial_tb` WHERE Ser_Serial_Second LIKE '%".$searchTerm."%' ORDER BY Ser_Serial_First ASC"); 
 
// Generate array with skills data 
$skillData = array(); 
if($query_Site->num_rows > 0){ 
    while($row = $query_Site->fetch_assoc()){ 
        $data['Ser_Serial_Second'] = $row['Ser_Serial_Second']; 
        array_push($skillData, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($skillData); 
?>