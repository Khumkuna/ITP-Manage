<?php 


include('Connect.php');

// $dateExport = date('DH');
// echo $dateExport;

// if($dateExport == 'Fri12')
// {
//   include('Backup_database.php');
// }


if (isset($_POST['Submit']) != "") {
	
	$Username = $conn->real_escape_string($_POST['Username']);
    $pswrd = $conn->real_escape_string($_POST['pswrd']);

        $hash = sha1($pswrd);
		$salt = "f#@V)Hu^%Hgfds";
		$hashpswrd = sha1($pswrd . $salt);


        $result_ACC=mysqli_query($conn, "SELECT * FROM Account_tb WHERE Acc_User='$Username' AND Acc_Password='$hashpswrd'")or die('Error In Session');
		$ACC_Result=mysqli_fetch_array($result_ACC);
		$Acc_ID = $ACC_Result['Acc_ID'];
		$Acc_Name = $ACC_Result['Acc_Name'];

        if($Acc_ID =="")
        {
            echo "ไม่มี User นี้ในระบบ";
        }
        else{
                $_SESSION['Acc_ID']=$ACC_Result['Acc_ID'];
				        header("location:Main-Menu.php");
        }

}


?>


<style>
/* body 
{
  font-family:Arial; 
  background: -webkit-linear-gradient(to right, #2086F8, #D1E3F7); 
  background: linear-gradient(to right, #2086F8, #D1E3F7); 
  color:whitesmoke;
} */

input[type=text], input[type=password]{
    width: 100%;
    margin: 10px 0;
    border-radius: 5px;
    padding: 15px 18px;
    box-sizing: border-box;
  }

  button {
    background-color: #030804;
    color: white;
    padding: 14px 20px;
    border-radius: 5px;
    margin: 7px 0;
    width: 100%;
    font-size: 18px;
  }

button:hover {
    opacity: 0.6;
    cursor: pointer;
  }


 


h1{
    text-align: center;
}


form{
    width:35rem;
    margin: auto;
    color:whitesmoke;
}

input{
    width: 100%;
    margin: 10px 0;
    border-radius: 5px;
    padding: 15px 18px;
    box-sizing: border-box;
  }

button {
    background-color: #030804;
    color: white;
    padding: 14px 20px;
    border-radius: 5px;
    margin: 7px 0;
    width: 100%;
    font-size: 18px;
  }

button:hover {
    opacity: 0.6;
    cursor: pointer;
  }


  form{
    width:35rem;
    margin: auto;
    color:whitesmoke;
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(11, 15, 13, 0.582);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.headingsContainer{
    text-align: center;
}
.mainContainer{
    padding: 16px;
}

.subcontainer{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
}

.subcontainer a{
    font-size: 16px;
    margin-bottom: 12px;
}

span.forgotpsd a {
    float: right;
    color: whitesmoke;
    padding-top: 16px;
  }

.forgotpsd a{
    color: rgb(74, 146, 235);
  }
  
.forgotpsd a:link{
    text-decoration: none;
  }

  .register{
    color: white;
    text-align: center;
  }
  
  .register a{
    color: rgb(74, 146, 235);
  }
  
  .register a:link{
    text-decoration: none;
  }
  @media screen and (max-width: 600px) {
  form{
    width: 25rem;
  }

}

@media screen and (max-width: 400px) {
  form{
    width: 20rem;
  }
}
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginpage.css">
    <link rel="icon" type="image/png" href="image/icon.png"/>

    <title>Inventory Store SVOA</title>
</head>
<body>

<video autoplay muted loop id="myVideo">
  <source src="image/BG.mp4" type="video/mp4">
</video>

<div align="center"><br><br><br><br>

</div><br><br>

    <form action="Login.php" method="POST">
        <!-- Headings for the form -->
        <br>
        <div class="headingsContainer">
            <image src="image/Logo.png" width="400px" ></image>
        </div>
        
        <div class="mainContainer">
            <!-- Username -->
            <label for="username"><?php echo $dateExport ?></label>
            <input type="text" placeholder="Enter Username" name="Username" required>

            <br><br>
            <label for="pswrd">Password</label>
            <input type="password" placeholder="Enter Password" name="pswrd" required>

            <button type="Submit" name="Submit">Login</button>
        </div>

    </form>


<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");
</script>



</body>
</html>



