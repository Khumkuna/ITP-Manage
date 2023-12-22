<?php 
include('Connect.php');


if($_SESSION['Acc_ID']!="")
{
	$Acc_ID = $_SESSION['Acc_ID'];
}

if(isset($_POST['Save']))
{
  $name = $_POST['name'];
  $Username = $_POST['Username'];
  $Password = $_POST['Password'];
  $Con_Password = $_POST['Con_Password'];
  $Status = $_POST['Status'];


  $salt = "f#@V)Hu^%Hgfds";
  $Password = sha1($Password . $salt);
  $Con_Password = sha1($Con_Password . $salt);


  $Check_Account=mysqli_query($conn, "SELECT * FROM Account_tb WHERE Acc_Name='$name' or Acc_User='$Username' ")or die('Error In Session');
  $ACC_Check=mysqli_fetch_array($Check_Account);
  $Acc_CheckID = $ACC_Check['Acc_ID'];

  if($Acc_CheckID == "")
  {
      $Check_ID = "Select * From account_tb ORDER BY Acc_ID DESC LIMIT 1";
      $result_Check_ID =mysqli_query($conn,$Check_ID);
      $row_Check_ID =mysqli_fetch_array($result_Check_ID);
      $Last_id = $row_Check_ID['Acc_ID'];
      $Rest = substr($Last_id, -3);
      $Insert_id = $Rest + 1;
      $ars = sprintf("%03d", $Insert_id);
      $ref = "Acc-";
      $Acc_ID = $ref.''.$ars;


      if($Con_Password == $Password)
      {
        $SQL_AddAcc ="INSERT INTO `Account_tb` (`ACC_ID`,`Acc_Name`,`Acc_User`,`Acc_Password`, `Acc_Status`) VALUES ('$Acc_ID', '$name','$Username','$Con_Password','$Status')";
        if ($conn->query($SQL_AddAcc)==TRUE)
          {
            echo '<script type="text/javascript">';
            echo 'alert("บันทึกข้อมูล Account เรียบร้อย");';
            echo 'window.location.href = "Main-Account.php";';
            echo '</script>';

          }
      }
      else
      {
        echo '<script type="text/javascript">';
        echo 'alert("โปรดตรวจสอบ Password ใหม่อีกครั้ง");';
        echo 'window.location.href = "Main-Account.php";';

        echo '</script>';
      }

  }
  else
  {
              echo '<script type="text/javascript">';
							echo 'alert("ชื่อ-นามสกุล หรือ Username ถูกใช้งานแล้ว");';
              echo 'window.location.href = "Main-Account.php";';

							echo '</script>';
  }
}

if(isset($_POST['SubSave']))
{
  $name = $_POST['name'];
  $Site_name = $_POST['Site_name'];
  $Address = $_POST['Address'];
  $Tel = $_POST['Tel'];
  $Status = $_POST['Status'];



  $Check_Account=mysqli_query($conn, "SELECT * FROM Sub_tb WHERE Sub_Name='$name' or Sub_Site='$Tel' ")or die('Error In Session');
  $ACC_Check=mysqli_fetch_array($Check_Account);
  $Sub_CheckID = $Sub_Check['Sub_ID'];

  if($Sub_CheckID == "")
  {
      $Check_ID = "Select * From Sub_tb ORDER BY Sub_ID DESC LIMIT 1";
      $result_Check_ID =mysqli_query($conn,$Check_ID);
      $row_Check_ID =mysqli_fetch_array($result_Check_ID);
      $Last_id = $row_Check_ID['Sub_ID'];
      $Rest = substr($Last_id, -3);
      $Insert_id = $Rest + 1;
      $ars = sprintf("%03d", $Insert_id);
      $ref = "Sub-";
      $Sub_ID = $ref.''.$ars;


        $SQL_AddSub ="INSERT INTO `Sub_tb` (`Sub_ID`,`Sub_Name`,`Sub_Site`,`Sub_Address`, `Sub_Tel`, `Sub_Type`) VALUES ('$Sub_ID', '$name','$Site_name','$Address','$Tel','$Status')";
        if ($conn->query($SQL_AddSub)==TRUE)
          {
            echo '<script type="text/javascript">';
            echo 'alert("บันทึกข้อมูล Sub-Contract เรียบร้อย");';
            echo 'window.location.href = "Main-Account.php";';
            echo '</script>';

          }
  }
  else
  {
              echo '<script type="text/javascript">';
							echo 'alert("ชื่อ-นามสกุล หรือ เบอร์ติดต่อ ถูกใช้งานแล้ว");';
              echo 'window.location.href = "Main-Account.php";';

							echo '</script>';
  }

}
if(isset($_POST['Edit']))
{
  $Acc_IDX= $_POST['Acc_IDX'];

  $SQL_Account = "UPDATE account_tb SET Acc_Password='b9b3786a1084cae5c1ee67d31835b99f0e73fe1e' WHERE Acc_ID='$Acc_IDX'";
          if ($conn->query($SQL_Account)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'alert("Reset Password เรียบร้อย");';
            echo 'window.location.href = "Main-Account.php";';
            echo '</script>';
          }
}

if(isset($_POST['Delete']))
{


  $Acc_IDX= $_POST['Acc_IDX'];

  $SQL_Account = "DELETE FROM account_tb WHERE Acc_ID ='$Acc_IDX';";
          if ($conn->query($SQL_Account)==TRUE) {
            echo '<script type="text/javascript">';
            echo 'alert("ลบข้อมูลเรียบร้อย");';
            echo '</script>';
          }



            
}






$result_ACC=mysqli_query($conn, "SELECT * FROM Account_tb WHERE Acc_ID='$Acc_ID'")or die('Error In Session');
$ACC_Result=mysqli_fetch_array($result_ACC);
$Acc_Name = $ACC_Result['Acc_Name'];

// <image src="image/Logo.png" width="250px" ></image>

?>

<!DOCTYPE html>
<html>
<head>
<title>Inventory Store SVOA</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" type="image/png" href="image/icon.png"/>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"> </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"> </script>
<style>
   body 
{
  font-family:Arial; 
  background: -webkit-linear-gradient(to right, #2086F8, #AAE2FC); 
  background: linear-gradient(to right, #2086F8, #AAE2FC); 
  color:whitesmoke;
}
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}

.accordion {
  background-color: #eee;
  color: #054F71;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #6EC3EA; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: #AAE2FC;
  overflow: hidden;
}


/*สำหรับ Table */
.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  background-color: #111;
  overflow-x: hidden;
}
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
}

.sidenav a:hover {
  color: #f1f1f1;
}








</style>
</head>
<body class="w3-blue-grey">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <a href="Main-Menu.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="Main-Account.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-users w3-xxlarge"></i>
    <p>Account</p>
  </a>
  <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>Inventory</p>
  </a>

</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="#photos" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center" id="home">
  <img src="image/Logo.png" style="width:250px">
  </header>

  
  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Account Management</h2>
    <hr class="w3-opacity">

    <button class="accordion">User</button>
      <div class="panel">
          <div class="w3-col m4">
            <div class="w3-row-padding">
              <div class="w3-col m12">
                <div class="w3-card w3-white">
                 
               
                  <form action="Main-Account.php" method="POST">
                    <div class="w3-container w3-padding">
                   <h2 class="w3-opacity" align="center">สร้างรายการ</h2>
                    <p>ชื่อ-นามสกุล
										<input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" id="name" name="name" value=""></p>

                    <p>User name
										<input type="text" class="form-control" placeholder="User.." id="Username" name="Username" value=""></p>
                    <p>Password
										<input type="password" class="form-control" placeholder="Password.." id="Password" name="Password" value=""></p>
                    <p>Confirm Password
										<input type="password" class="form-control" placeholder="Password.." id="Con_Password" name="Con_Password" value=""></p>
                    
                      <p>Status
                      <select name="Status" id="Status" class="form-control">
                      <option value="User">User</option>
                      <option value="Admin">Admin</option>
                    </select></p>
                    <button type="Submit" class="btn btn-success btn-block" name="Save"><i class="fa fa-pencil"></i> Save</button>
                    </div>
                    </form>
                
                </div>
              </div>
            </div>
          </div>


          <div class="w3-col m8">
            <div class="w3-row-padding">
              <div class="w3-col m12">
                <div class="w3-card w3-white">
                  <div class="w3-container w3-padding">
                    <h2 class="w3-opacity" align="center">Account</h2>
                    <div class="tbl-header">
                    <table width="100%" >
                    <thead>
                      <tr align="center">
                        <th width="30%">ชื่อ</th>
                        <th width="30%">Username</th>
                        <th width="20%">Status</th>
                        <th width="20%">Tool</th>
                      </tr>
                      </thead>
                    </table>
                    </div>
                      <?php 
                      $sql_Si="Select * from Account_tb ORDER BY Acc_ID ASC";
                      $query_Si=mysqli_query($conn,$sql_Si);
                      while ($data_Si=mysqli_fetch_array($query_Si))                       
                      { 
                      $Acc_IDX = $data_Si["Acc_ID"];
                      $Acc_NameX = $data_Si["Acc_Name"];
                      $Acc_UserX = $data_Si["Acc_User"];
                      $Acc_StatusX = $data_Si["Acc_Status"];


                      ?>
                    <div class="tbl-content">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tbody>
                      <tr>                      
                        <td align="left" width="30%"><?php echo $Acc_NameX; ?></td>
                        <td align="center" width="30%"><?php echo $Acc_UserX;?></td>
                        <td align="center" width="20%"><?php echo $Acc_StatusX;?></td>
                        <input type="text" hidden class="form-control" placeholder="User.." id="Username" name="Username" value=""></p>
                        <form acction="Main-Account.php" method="POST">
                         <input type="text" hidden  id="Acc_IDX" name="Acc_IDX" value="<?php echo $Acc_IDX ?>"></p>
                          <td align="center" width="10%">
                          <button class="btn" name="Edit"><i class="fa fa-refresh" ></i></button>
                          </td>
                        </form>

                        <form acction="Main-Account.php" method="POST">
                          <input type="text" hidden  id="Acc_IDX" name="Acc_IDX" value="<?php echo $Acc_IDX ?>"></p>
                          <td align="center" width="10%">
                          <button class="btn" name="Delete"><i class="fa fa-trash"></i></button>
                          </td>
                        </form>

                      </tr>
                      <?php 
                      }
                      ?>

                       </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
         

      </div>
      <hr>

      <button class="accordion">Sub-Contract</button>
      <div class="panel">
      <div class="w3-col m4">
            <div class="w3-row-padding">
              <div class="w3-col m12">
                <div class="w3-card w3-white">
                 
               
                  <form action="Main-Account.php" method="POST">
                    <div class="w3-container w3-padding">
                   <h3 class="w3-opacity" align="center">สร้าง Sub-Contract</h3>
                    <p>ชื่อ-นามสกุล
										<input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" id="name" name="name" value=""></p>

                    <p>ชื่อศูนย์
										<input type="text" class="form-control" placeholder="ชื่อศูนย์"  name="Site_name" value=""></p>

                    <p>ที่อยู่
										<textarea class="form-control" name="Address"  rows="3" value=""></textarea></p>

                    <p>เบอร์ติดต่อ
										<input type="text" class="form-control" placeholder="เบอร์ติดต่อ"  name="Tel" value=""></p>

                    
                      <p>Status
                      <select name="Status" id="Status" class="form-control">
                      <option value="ทีมช่าง">ทีมช่าง</option>
                      <option value="ศูนย์ซ่อม">ศูนย์ซ่อม</option>
                    </select></p>
                    <button type="Submit" class="btn btn-success btn-block" name="SubSave"><i class="fa fa-pencil"></i> Save</button>
                    </div>
                    </form>
                
                </div>
              </div>
            </div>
          </div>


          <div class="w3-col m8">
            <div class="w3-row-padding">
              <div class="w3-col m12">
                <div class="w3-card w3-white">
                  <div class="w3-container w3-padding">
                    <h2 class="w3-opacity" align="center">Sub-Contract</h2>
                    <div class="tbl-header">
                    <table width="100%" >
                    <thead>
                      <tr align="center">
                        <th width="30%">ชื่อ</th>
                        <th width="30%">เบอร์ติดต่อ</th>
                        <th width="20%">Status</th>
                        <th width="20%">Tool</th>
                      </tr>
                      </thead>
                    </table>
                    </div>
                      <?php 
                      $sql_Si="Select * from sub_tb ORDER BY Sub_ID ASC";
                      $query_Si=mysqli_query($conn,$sql_Si);
                      while ($data_Si=mysqli_fetch_array($query_Si))                       
                      { 
                      $sub_IDX = $data_Si["sub_ID"];
                      $Sub_NameX = $data_Si["Sub_Name"];
                      $Sub_TelX = $data_Si["Sub_Tel"];
                      $Sub_TypeX = $data_Si["Sub_Type"];


                      ?>
                    <div class="tbl-content">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tbody>
                      <tr>                      
                        <td align="left" width="30%"><?php echo $Sub_NameX; ?></td>
                        <td align="center" width="30%"><?php echo $Sub_TelX;?></td>
                        <td align="center" width="20%"><?php echo $Sub_TypeX;?></td>
                        <form acction="Main-Account.php" method="POST">
                         <input type="text" hidden  id="sub_IDX" name="sub_IDX" value="<?php echo $sub_IDX ?>"></p>
                          <td align="center" width="10%">
                          <button class="btn" name="SubEdit"><i class="fa fa-refresh" ></i></button>
                          </td>
                        </form>

                        <form acction="Main-Account.php" method="POST">
                          <input type="text" hidden  id="sub_IDX" name="sub_IDX" value="<?php echo $sub_IDX ?>"></p>
                          <td align="center" width="10%">
                          <button class="btn" name="SubDelete"><i class="fa fa-trash"></i></button>
                          </td>
                        </form>

                      </tr>
                      <?php 
                      }
                      ?>

                       </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              </div>      

      </div>
    <hr>
  
    
  </div>


 
   
  








    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
</div>




<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

<script>
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();

</script>

</body>
</html>

