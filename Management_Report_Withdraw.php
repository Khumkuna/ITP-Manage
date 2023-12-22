<?php
include('Connect.php');


if($_SESSION['Acc_ID']!="")
{
	$Acc_ID = $_SESSION['Acc_ID'];
}

$result_ACC=mysqli_query($conn, "SELECT * FROM Account_tb WHERE Acc_ID='$Acc_ID'")or die('Error In Session');
$ACC_Result=mysqli_fetch_array($result_ACC);
$Acc_Name = $ACC_Result['Acc_Name'];
$Acc_Status = $ACC_Result['Acc_Status'];


if(isset($_POST['Save'])==true)
{
  $_SESSION['Withdraw_No'] = $_POST['Withdraw_No'];

}
$Withdraw_No = $_SESSION['Withdraw_No'];





$result_Sub=mysqli_query($conn, "SELECT * FROM Sub_tb,Account_tb,withdraw_tb WHERE 
Sub_tb.Sub_ID = withdraw_tb.Sub_ID and
Account_tb.Acc_ID = withdraw_tb.ACC_ID and
withdraw_tb.WD_No = '$Withdraw_No'")or die('Error In Session');
$Sub_Result=mysqli_fetch_array($result_Sub);
$Sub_Name = $Sub_Result['Sub_Name'];
$Sub_Site = $Sub_Result['Sub_Site'];
$Sub_Address = $Sub_Result['Sub_Address'];
$Sub_Tel = $Sub_Result['Sub_Tel'];
$Acc_Name = $Sub_Result['Acc_Name'];
$WD_Date = $Sub_Result['WD_Date'];
$WD_Date= $Sub_Result['WD_Date'];
$Ser_IDShow= $Sub_Result['Ser_ID'];




?>



<html lang="en">
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

		
	</head>
	<style>
.header, .header-space,
.footer, .footer-space {
  height: 80px;
}
.header {
  position: auto;
  top: 20px;
}
.footer {
  position: auto;
  bottom: 0;
}
</style>

	<body>


		<div class="container">
			<div class="row">
			
			
				<div class="col-sm-12">
				<style>
					@media print {
						.no-print {
							visibility: hidden;
						}
						}
				</style>

				<div class="no-print" align="right">
							<form action="Management-Withdraw-All.php">
										<button class="w3-button w3-white w3-border w3-border-green w3-round-large">Complete</button>
							</form>

				</div>
					
				<br>	
					<table width="100%" border="2" >
						<tr>
							<td width="50%" align="center"><img src="image\LOGO_SV.png" width="50%"><br>
							<h5><B>บริษัท เอสวีโอเอ จำกัด (มหาชน)</B></h5>
							</td>
							<td width="50%" align="center"><h3>ใบส่งสินค้า</h3></td>
						</tr>

					</table>
					<h5 align="center"></h5><br>

					

					<table width="100%" >
						<tr>
							<td width="34%" align="left"><h5><b>นามลูกค้า : </b><?php echo $Sub_Name; ?></h5>  </td>
							<td width="33%" align="left"><h5><b>ในนามศูนย์ : </b>  <?php echo $Sub_Site; ?> </h5></td>
							<td width="33%" align="right"><h5><b>เลขที่เอกสาร :</b> <?php echo $Withdraw_No ?></h5></td>
						</tr>
						<tr>
							<td width="67%" align="left" colspan="2"><h5><b>ที่อยู่ : </b><?php echo $Sub_Address ?></h5></td>
							<td width="33%" align="right"><h5><b>วันที่ : </b> <?php echo $WD_Date ?></h5></td>
						</tr>
						<tr>
							<td width="67%" align="left" colspan="2"><h5><b>ผู้รับสินค้า : </b> <?php echo $Sub_Name; ?></h5></td>
							
							<td width="33%" align="right"><h5><b>ชื่อโครงการ :</b>
							<?php 

								$sql_ProjectShow="Select * from project_tb,device_tb,serial_tb where 
								project_tb.Project_ID = device_tb.Project_ID and
								device_tb.Dev_ID = serial_tb.Dev_ID and
								serial_tb.Ser_Withdraw = 'OUT-$Withdraw_No' group by device_tb.Project_ID";
								$query_ProjectShow=mysqli_query($conn,$sql_ProjectShow);
								$C = 0;
								while ($data_ProjectShow=mysqli_fetch_array($query_ProjectShow))                       
								{ 
									$C++;
										$Project_Name = $data_ProjectShow["Project_Name"];
								?>

									<?php if($C>1){echo  ','.$Project_Name;}else{echo  $Project_Name;}   ?> 

							<?php } ?>
							</h5></td>



						</tr>
						<tr>
							<td width="67%" align="left" colspan="2"><h5><b>เบอร์ติดต่อ : </b><?php echo $Sub_Tel; ?></h5></td>
							<td width="33%" align="right"><h5><b>สัญญาเลขที่ : </b>

							<?php 

								$sql_ProjectShow="Select * from project_tb,device_tb,serial_tb where 
								project_tb.Project_ID = device_tb.Project_ID and
								device_tb.Dev_ID = serial_tb.Dev_ID and
								serial_tb.Ser_Withdraw = 'OUT-$Withdraw_No' group by device_tb.Project_ID";
								$query_ProjectShow=mysqli_query($conn,$sql_ProjectShow);
								$C = 0;
								while ($data_ProjectShow=mysqli_fetch_array($query_ProjectShow))                       
								{ 
									$C++;
										$Project_No = $data_ProjectShow["Project_No"];
								?>

							 		<?php if($C>1){echo  ','.$Project_No;}else{echo  $Project_No;}   ?> 

							<?php
							
						
						} ?> 
							</h5></td>
						</tr>

					</table>
					<br>
					<h6 align="center">บริษัท เอสวีโอเอ จำกัด (มหาชน) ได้จัดส่งสินค้า เครื่องคอมพิวเตอร์และอุปกรณ์ต่างๆ ดังรายการต่อไปนี้</h6>
				</div>
				
				
			<div class="container-fluid" >	
				<div class="col-sm-12">
					<table width="100%" id="customers" border="2">
								<tr align="center" class="font-weight-bold" >
									<th width="5%">ลำดับ</th>
									<th width="30%">รหัสสินค้า</th>
									<th width="30%">รายละเอียดสินค้า</th>
									<th width="10%">จำนวน</th>
									<th width="30%">หมายเลขเครื่อง</th>
								</tr>
								<hr>
						<?php

						$PerPage = 25;

							$sql_Count="SELECT * FROM withdraw_tb where WD_No = '$Withdraw_No'";
							$result_Count=mysqli_query($conn,$sql_Count);
							$rowcount=mysqli_num_rows($result_Count);

							if($rowcount<=$PerPage)
							{

							$sql_GroupShow="Select * from serial_tb,withdraw_tb where
							serial_tb.Ser_ID = withdraw_tb.Ser_ID and
							withdraw_tb.WD_No = '$Withdraw_No'";
							$query_GroupShow=mysqli_query($conn,$sql_GroupShow);
							$Num_Group = 0;
							while ($data_GroupShow=mysqli_fetch_array($query_GroupShow))     
							{ 
							$Num_Group++;

							$Dev_ID = $data_GroupShow['Dev_ID'];
							$Ser_Serial_Second = $data_GroupShow['Ser_Serial_Second'];
							$Ser_Box = $data_GroupShow['Ser_Box'];
							$WD_Unit = $data_GroupShow['WD_Unit'];
							$WD_Remark = $data_GroupShow['WD_Remark'];

							$sql_ModelShow=mysqli_query($conn, "SELECT * FROM project_tb,device_tb WHERE 
							project_tb.Project_ID = device_tb.Project_ID and
							Dev_ID='$Dev_ID'")or die('Error In Session');
							$query_ModelShow=mysqli_fetch_array($sql_ModelShow);
							$Project_Name = $query_ModelShow['Project_Name'];
							$Project_No = $query_ModelShow['Project_No'];
							$Dev_Model = $query_ModelShow['Dev_Model'];

							
									?>
									<tr>
												<td align="center"><?php echo $Num_Group?></td>
												<td align="left">&nbsp;<?php echo $Project_Name.' ('.$Project_No.')'?></td>
												<td align="left">&nbsp;<?php echo $Dev_Model;	?></td>
												<td align="center"><?php echo $WD_Unit;	?></td>
												<td align="center"><?php echo $Ser_Serial_Second;	?></td>
									</tr>
									<?php 
										


					
							} 
							
								if($Num_Group < $PerPage)
								{
									$Get_Count = $PerPage - $Num_Group;

							
									for($i;$i< $Get_Count;$i++)
											{
												?>
												<tr>
													<td align="center">&nbsp;</td>
													<td align="left">&nbsp;</td>
													<td align="left">&nbsp;</td>
													<td align="center">&nbsp;</td>
													<td align="center">&nbsp;</td>
												</tr>
											<?php } 

								}
					
							?>
						</table><br>




							<table width="100%">
								<tr>
									<td width="10%"><b>หมายเหตุ: <?php echo $rowcount ?></td>
									<td width="90%"><u><?php echo $WD_Remark ?></u></td>
								</tr>
							</table><br><br>
							<p align="center">ได้ตรวจรับสินค้าตามรายการข้างบนนี้ครบถ้วนถูกต้อง</p>
							<table width="100%">
								<tr>
									<td width="50%" align="center"><b>ผู้ตรวจรับสินค้า</b><br>ลงชื่อเจ้าหน้าที่หน่วยงาน</td>
									<td width="50%" align="center"><b>ผู้ส่งสินค้า</b><br>ลงชื่อเจ้าหน้า บริษัท เอสวีโอเอ จำกัด (มหาชน)</td>
								</tr>
								<tr>
									<td width="50%" align="center"><br>...............................................................................</td>
									<td width="50%" align="center"><br>...............................................................................</td>
								</tr>
								<tr>
									<td width="50%" align="center"><br>(...............................................................................)</td>
									<td width="50%" align="center"><br>(...............................................................................)</td>
								</tr>
								<tr>
									<td width="50%" align="center"><br>วันที่:  ...................................................................</td>
									<td width="50%" align="center"><br>วันที่:  ...................................................................</td>
								</tr>
								<tr>
									<td width="50%" align="center"><br>เบอร์ติดต่อ:  ...................................................................</td>
									<td width="50%" align="center"><br>เบอร์ติดต่อ
									:  ...................................................................</td>
								</tr>
							</table><br><br>
							<p align="center">กรุณากรอกข้อมูลให้ชัดเจน และครบถ้วนเพื่อประโยชน์ในการบริการ</p>
							<hr><br><br>

							<footer>
								<div style="float:left">File C:\Form\FR-P14</div>
								<div style="float:right">พิมพ์ครั้งที่ 1</div><br>
							</footer>


							<?php 
							}
//****************************************************************************************************************************/							
							else //แบบรายการมากกว่า 25 บรรทัด
							{

							$sql_GroupShow="Select * from serial_tb,withdraw_tb where
							serial_tb.Ser_ID = withdraw_tb.Ser_ID and
							withdraw_tb.WD_No = '$Withdraw_No' group by serial_tb.Dev_ID";
							$query_GroupShow=mysqli_query($conn,$sql_GroupShow);
							$Num_Group = 0;
							while ($data_GroupShow=mysqli_fetch_array($query_GroupShow))     
							{ 
							$Num_Group++;

							$Dev_ID = $data_GroupShow['Dev_ID'];
							$Ser_Serial_Second = $data_GroupShow['Ser_Serial_Second'];
							$Ser_Box = $data_GroupShow['Ser_Box'];
							$WD_Unit = $data_GroupShow['WD_Unit'];
							$WD_Remark = $data_GroupShow['WD_Remark'];
							$Ser_SN = $data_GroupShow['Ser_SN'];

							$sql_ModelShow=mysqli_query($conn, "SELECT * FROM project_tb,device_tb WHERE 
							project_tb.Project_ID = device_tb.Project_ID and
							device_tb.Dev_ID='$Dev_ID'")or die('Error In Session');
							$query_ModelShow=mysqli_fetch_array($sql_ModelShow);
							$Project_Name = $query_ModelShow['Project_Name'];
							$Project_No = $query_ModelShow['Project_No'];
							$Dev_Model = $query_ModelShow['Dev_Model'];


							$sql_GetCount="SELECT * FROM serial_tb,withdraw_tb where
							 serial_tb.Ser_ID = withdraw_tb.Ser_ID and
							 serial_tb.Dev_ID ='$Dev_ID' and
							 withdraw_tb.WD_No = '$Withdraw_No'";
							$result_GetCount=mysqli_query($conn,$sql_GetCount);
							$rowGetCount=mysqli_num_rows($result_GetCount);



							
									?>
									<tr>
												<td align="center"><?php echo $Num_Group?></td>
												<td align="left">&nbsp;<?php echo $Project_Name.' ('.$Project_No.')'?></td>
												<td align="left">&nbsp;<?php echo $Dev_Model;	?></td>
												
												<?php 
												if($Ser_SN=='Fix')
												{ ?>
													<td align="center"><?php echo $rowGetCount;	?></td>
													<td align="center">(ข้อมูลตามเอกสารแนบ)</td>
												<?php }
												else{ ?>
													<td align="center"><?php echo $WD_Unit;	?></td>
													<td align="center">(ไม่ระบุ Serial-Number)</td>
												<?php } ?>
									</tr>
									<?php 
										


					
							} 
							
								if($Num_Group < $PerPage)
								{
									$Get_Count = $PerPage - $Num_Group;

							
									for($i;$i< $Get_Count;$i++)
											{
												?>
												<tr>
													<td align="center">&nbsp;</td>
													<td align="left">&nbsp;</td>
													<td align="left">&nbsp;</td>
													<td align="center">&nbsp;</td>
													<td align="center">&nbsp;</td>
												</tr>
											<?php } 

								}
					
							?>
						</table><br>




							<table width="100%">
								<tr>
									<td width="10%"><b>หมายเหตุ:</td>
									<td width="90%"><u><?php echo $WD_Remark ?></u></td>
								</tr>
							</table><br><br>
							<p align="center">ได้ตรวจรับสินค้าตามรายการข้างบนนี้ครบถ้วนถูกต้อง</p>
							<table width="100%">
								<tr>
									<td width="50%" align="center"><b>ผู้ตรวจรับสินค้า</b><br>ลงชื่อเจ้าหน้าที่หน่วยงาน</td>
									<td width="50%" align="center"><b>ผู้ส่งสินค้า</b><br>ลงชื่อเจ้าหน้า บริษัท เอสวีโอเอ จำกัด (มหาชน)</td>
								</tr>
								<tr>
									<td width="50%" align="center"><br>...............................................................................</td>
									<td width="50%" align="center"><br>...............................................................................</td>
								</tr>
								<tr>
									<td width="50%" align="center"><br>(...............................................................................)</td>
									<td width="50%" align="center"><br>(...............................................................................)</td>
								</tr>
								<tr>
									<td width="50%" align="center"><br>วันที่:  ...................................................................</td>
									<td width="50%" align="center"><br>วันที่:  ...................................................................</td>
								</tr>
								<tr>
									<td width="50%" align="center"><br>เบอร์ติดต่อ:  ...................................................................</td>
									<td width="50%" align="center"><br>เบอร์ติดต่อ
									:  ...................................................................</td>
								</tr>
							</table><br>
							<p align="center">กรุณากรอกข้อมูลให้ชัดเจน และครบถ้วนเพื่อประโยชน์ในการบริการ</p>
							<hr>

							<div class="footer" >
								<div style="float:left">File C:\Form\FR-P14</div>
								<div style="float:right">พิมพ์ครั้งที่ 1</div>
								
							</div>
							<!-- ****************************ตารางแสดงรายการ Serialnumber ทั้งหมด**************************** -->

						<div class="header">
							<div class="float-left"><b>วันที่: </b><?php echo $WD_Date ?></div>
							<div class="float-right"><b>เลขที่เอกสาร: </b><?php echo $Withdraw_No ?></div>
						</div>
							

					

					
						<table width="100%" border="1">
										<thead>
												<tr align="center">
													<th>ลำดับ</th>
													<th>(Box)-Serial-Number</th>
													<th>จำนวน</th>
												</tr>
										</thead>

							<?php

							$sql_GetModel="Select * from device_tb,withdraw_tb where device_tb.Dev_ID =  withdraw_tb.Dev_ID and withdraw_tb.WD_No = '$Withdraw_No' group by withdraw_tb.Dev_ID";
							$query_GetModel=mysqli_query($conn,$sql_GetModel);
							while ($data_GetModel=mysqli_fetch_array($query_GetModel))     
							{
									$DevModel=$data_GetModel['Dev_Model'];
									$DevID=$data_GetModel['Dev_ID'];

									$sql_CountModel="Select * from withdraw_tb where withdraw_tb.WD_No = '$Withdraw_No' and Dev_ID = '$DevID'";
									$query_CountModel=mysqli_query($conn,$sql_CountModel);
									$CountX=0;
									while ($data_CountModel=mysqli_fetch_array($query_CountModel)){$CountX = $data_CountModel['WD_Unit']+$CountX;}



								
								?>
									<tbody>
										<tr>
											<td colspan="2" align="center"><b><?php echo $DevModel ?></b></td>
											<td align="right"><b><?php echo $CountX ?></b></td>
										</tr>
									</tbody>
									<?php 
										$sql_WithSN="Select * from withdraw_tb where WD_No = '$Withdraw_No' and Dev_ID = '$DevID'";
										$query_WithSN=mysqli_query($conn,$sql_WithSN);
										$Num=0;
												while ($data_WithSN=mysqli_fetch_array($query_WithSN))     
												{ $Num++;
													$ID=$data_WithSN['Ser_ID'];
													$WD_Unit=$data_WithSN['WD_Unit'];


													$sql_ModelDetail=mysqli_query($conn, "SELECT * FROM project_tb,device_tb,serial_tb WHERE 
													project_tb.Project_ID = device_tb.Project_ID and
													device_tb.Dev_ID = serial_tb.Dev_ID and
													serial_tb.Ser_ID = '$ID'")or die('Error In Session');
													$query_ModelDetail=mysqli_fetch_array($sql_ModelDetail);
													$Box = $query_ModelDetail['Ser_Box'];
													$Serial_Second = $query_ModelDetail['Ser_Serial_Second'];
													$Name = $query_ModelDetail['Project_Name'];
													$No_Pro = $query_ModelDetail['Project_No'];
													$Model = $query_ModelDetail['Dev_Model'];


													?>
															
																<tbody>
																	<tr>
																		<td><?php echo $Num ?></td>
																		<td><?php echo '('.$Box.')-'.$Serial_Second.')' ?></td>
																		<td align="right"><?php echo $WD_Unit ?></td>
																	</tr>
																	
																</tbody>

															

													<?php
													} ?>
													<tr>
														<td colspan="3"> &nbsp;</td>
													</tr>
											<?php }
							?>
							</table>

							<?php
							
							}
							?>























	
			</div>
			<div class="col-sm-1">
			</div>
		</div>
		
		</div>
		

		</body>
</html>
