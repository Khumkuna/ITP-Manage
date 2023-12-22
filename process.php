<?php 
include('Connect.php');



if (isset($_POST['Receive_check'])) {
    $Receive = $_POST['Receive_No'];
    $sql = "SELECT * FROM receive_tb WHERE Rec_No = '$Receive' ";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo 'taken';
    } else {
        echo 'not_taken';
    }
    exit();
}


?>