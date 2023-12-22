
<?php

include('Connect.php');


$Acc_ID = $_SESSION['Acc_ID'];

$result_ACC=mysqli_query($conn, "SELECT * FROM Account_tb WHERE Acc_ID='$Acc_ID'")or die('Error In Session');
$ACC_Result=mysqli_fetch_array($result_ACC);
$ACC_F = $ACC_Result['ACC_Fullname'];
$ACC_U = $ACC_Result['ACC_Username'];
$ACC_S = $ACC_Result['ACC_Status'];
$ACC_Site = $ACC_Result['ACC_Site'];
$ACC_Tel = $ACC_Result['ACC_Tel'];
$ACC_Line = $ACC_Result['ACC_Line'];


if( isset($_POST['Submit']) )
{

  $folder_path = 'Document/Repair/';


  $Project_ID = $_POST['Project_ID_Selected'];
  $Re_Device = $_POST['Device_ID_Selected'];
  $Re_Serial = $_POST['Re_Serial'];
  $Re_Fail = $_POST['Re_Fail'];
  $Re_Username = $_POST['Re_Username'];
  $Re_Tel = $_POST['Re_Tel'];
  $Re_Status = "Pending";
  $Re_Phase = "Phase-3";
  $Si_ID =  $_POST['Si_ID'];
  $Re_Call_By =  $_POST['Re_Call_By'];
  $Pic_A =  $_POST['Pic_A'];

  $DateNow = date('Ymd',strtotime('+543 year'));
  $Re_DateCreate = date('d/m/Y H:i:s',strtotime('+543 year'));
  $Re_DateCreateX = date('d/m/Y',strtotime('+543 year'));

  if($Re_Serial == "" )
  {
    $Re_Serial = $Re_Device.'-'.$Si_ID;
  }



  


	$Check_ID = "Select * From repair_tb ORDER BY Re_ID DESC LIMIT 1";
	$result_Check_ID =mysqli_query($conn,$Check_ID);
	$row_Check_ID =mysqli_fetch_array($result_Check_ID);
	$Last_id = $row_Check_ID['Re_ID'];
	$Rest = substr($Last_id, -5);
	$Insert_id = $Rest + 1;
	$ars = sprintf("%05d", $Insert_id);
	$ref = "Rep";
	$Re_ID = $ref.''.$ars;



  $Check_Job = "Select * From repair_tb where Re_DateCreate Like '$Re_DateCreateX%'  ORDER BY Re_Job DESC LIMIT 1";
	$result_Check_Job =mysqli_query($conn,$Check_Job);
	$row_Check_Job =mysqli_fetch_array($result_Check_Job);
	$Last_Job = $row_Check_Job['Re_Job'];
	$Rest_Job = substr($Last_Job,-3);
	$Insert_Job = $Rest_Job + 1;
	$ars_Job = sprintf("%03d", $Insert_Job);
	$ref_Job = "No";
	$Re_Job = $ref_Job.'-'.$DateNow.'-'.$ars_Job;


  $Check_Log = "Select * From repair_log_tb ORDER BY Rel_ID DESC LIMIT 1";
	$result_Check_Log =mysqli_query($conn,$Check_Log);
	$row_Check_Log =mysqli_fetch_array($result_Check_Log);
	$Last_Log = $row_Check_Log['Rel_ID'];
	$Rest_Log = substr($Last_Log,-9);
	$Insert_Log = $Rest_Log + 1;
	$ars_Log = sprintf("%09d", $Insert_Log);
	$ref_Log = "Log";
	$Rel_ID = $ref_Log.'-'.$ars_Log;

  
  $Pic_A = basename($_FILES['Pic_A']['name']);
  if($Pic_A != "")
  {
    $Name_Pic_A = $Re_Job."-Pic_A";
    $imageFileType_Pic_A = strtolower(pathinfo($Pic_A,PATHINFO_EXTENSION));
    $newname_Pic_A =$folder_path.$Name_Pic_A.'.'.$imageFileType_Pic_A;
    move_uploaded_file($_FILES['Pic_A']['tmp_name'], $newname_Pic_A);
  }

  
  $Pic_B = basename($_FILES['Pic_B']['name']);
  if($Pic_B != "")
  {
    $Name_Pic_B = $Re_Job."-Pic_B";
    $imageFileType_Pic_B = strtolower(pathinfo($Pic_B,PATHINFO_EXTENSION));
    $newname_Pic_B =$folder_path.$Name_Pic_B.'.'.$imageFileType_Pic_B;
    move_uploaded_file($_FILES['Pic_B']['tmp_name'], $newname_Pic_B);
  }

  $Pic_C = basename($_FILES['Pic_C']['name']);
  if($Pic_C != "")
  {
    $Name_Pic_C = $Re_Job."-Pic_C";
    $imageFileType_Pic_C = strtolower(pathinfo($Pic_C,PATHINFO_EXTENSION));
    $newname_Pic_C =$folder_path.$Name_Pic_C.'.'.$imageFileType_Pic_C;
    move_uploaded_file($_FILES['Pic_C']['tmp_name'], $newname_Pic_C);
  }

  $Video_A = basename($_FILES['Video_A']['name']);
  if($Video_A != "")
  {
    $Name_Video_A = $Re_Job."-Video_A";
    $imageFileType_Video_A = strtolower(pathinfo($Video_A,PATHINFO_EXTENSION));
    $newname_Video_A =$folder_path.$Name_Video_A.'.'.$imageFileType_Video_A;
    move_uploaded_file($_FILES['Video_A']['tmp_name'], $newname_Video_A);
  }

  
	$SQL_Add ="INSERT INTO `repair_tb` (`Re_ID`,`Re_Device`,`Re_Serial`,`Re_Job`,`Re_DateCreate`,`Re_Fail`,`Re_Status`,`Si_ID`,`Re_Username`,`Re_Tel`,`Re_Phase`,`Re_Call_By`,`Re_Lastaction`,`Re_Lastactionby`,`Pic_A`,`Pic_B`,`Pic_C`,`Video_A`,`Project_ID`) 
  VALUES ('$Re_ID', '$Re_Device', '$Re_Serial', '$Re_Job', '$Re_DateCreate', '$Re_Fail', '$Re_Status', '$Si_ID', '$Re_Username', '$Re_Tel', '$Re_Phase', '$Re_Call_By', 'Call-Center', '$ACC_F', '$newname_Pic_A', '$newname_Pic_B', '$newname_Pic_C', '$newname_Video_A','$Project_ID')";
if ($conn->query($SQL_Add)==TRUE)
          {
            // $SQL_AddLog ="INSERT INTO `repair_log_tb` (`Rel_ID`,`Rel_Date`,`Rel_Action`,`Rel_Actionby`,`Rel_Remark`,`Re_ID`) 
            //   VALUES ('$Rel_ID', '$Re_DateCreate', 'Create Job ID:$Re_Job', '$Re_Call_By', '-', '$Re_ID')";
            // if ($conn->query($SQL_AddLog)==TRUE)
            //   {
                  echo "
                  <script src='https://code.jquery.com/jquery-3.6.4.js'></script>
                  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                  <script>
                        $(document).ready(function(){
                          Swal.fire({
                            title:'Open Job Complete!',
                            icon: 'success',
                            timer: 5000,
                            showConfirmButton: false
                          });
                        });
                        </script>";
                      
                        header("refresh:2; url=Manage-Call-Screen.php");
                // }
          }
}




?>
