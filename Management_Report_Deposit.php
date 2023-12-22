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
  $_SESSION['DR_No'] = $_POST['DR_No'];

}
$DR_No = $_SESSION['DR_No'];


$result_Sub=mysqli_query($conn, "SELECT * FROM account_tb,deposit_tb,deposit_detail_tb,deposit_receive_tb where 
account_tb.Acc_ID = deposit_receive_tb.Acc_ID and
deposit_tb.Dep_ID = deposit_detail_tb.Dep_ID and
deposit_detail_tb.DEPD_ID = deposit_receive_tb.DEPD_ID and
deposit_receive_tb.DR_No = '$DR_No'")or die('Error In Session');
$Sub_Result=mysqli_fetch_array($result_Sub);
$Dep_Name = $Sub_Result['Dep_Name'];
$Dep_Tel = $Sub_Result['Dep_Tel'];
$Dep_Department = $Sub_Result['Dep_Department'];
$Brand_ID = $Sub_Result['Brand_ID'];
$Acc_Name = $Sub_Result['Acc_Name'];
$Type_ID = $Sub_Result['Type_ID'];
$DR_Date= $Sub_Result['DR_Date'];
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
							<td width="50%" align="center"><h3>เอกสารรับฝาก</h3></td>
						</tr>

					</table>
					<h5 align="center"></h5><br>

					

					<table width="100%" >
						<tr>
							<td width="34%" align="left"><h5><b>ชื่อผู้ฝาก : </b><?php echo $Dep_Name; ?></h5>  </td>
							<td width="33%" align="left"><h5><b>เบอร์ติดต่อ : </b>  <?php echo $Dep_Tel; ?> </h5></td>
							<td width="33%" align="right"><h5><b>เลขที่เอกสาร :</b> <?php echo $DR_No ?></h5></td>
						</tr>
						<tr>
							<td width="67%" align="left" colspan="2"><h5><b>ที่อยู่ : </b>Inventory Store</h5></td>
							<td width="33%" align="right"><h5><b>วันที่ : </b> <?php echo $DR_Date ?></h5></td>
						</tr>
						<tr>
							<td width="67%" align="left" colspan="3"><h5><b>ผู้รับสินค้า : </b> <?php echo $Acc_Name; ?></h5></td>
							


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

							$sql_GroupShow="Select * from deposit_receive_tb,serial_deposit_tb where
							deposit_receive_tb.SD_ID = serial_deposit_tb.SD_ID and
							deposit_receive_tb.DR_No = '$DR_No'";
							$query_GroupShow=mysqli_query($conn,$sql_GroupShow);
							$Num_Group = 0;
							while ($data_GroupShow=mysqli_fetch_array($query_GroupShow))     
							{ 
							$Num_Group++;

							$DEPD_ID = $data_GroupShow['DEPD_ID'];
							$SD_Serial = $data_GroupShow['SD_Serial'];
							$SD_No = $data_GroupShow['SD_No'];
							$SD_QTY = $data_GroupShow['SD_QTY'];

							$sql_ModelShow=mysqli_query($conn, "SELECT * FROM deposit_tb,brand_tb,type_tb,deposit_detail_tb WHERE 
							deposit_tb.Dep_ID = deposit_detail_tb.Dep_ID and
							brand_tb.Brand_ID = deposit_detail_tb.Brand_ID and
							type_tb.Type_ID = deposit_detail_tb.Type_ID and
							deposit_detail_tb.DEPD_ID='$DEPD_ID'")or die('Error In Session');
							$query_ModelShow=mysqli_fetch_array($sql_ModelShow);
							$DEPD_Model = $query_ModelShow['DEPD_Model'];
							$Type_Name = $query_ModelShow['Type_Name'];
							$Brand_Name = $query_ModelShow['Brand_Name'];


									?>
									<tr>
												<td align="center"><?php echo $Num_Group?></td>
												<td align="left">&nbsp;<?php echo ' -'?></td>
												<td align="left">&nbsp;<?php echo '('.$Brand_Name.'-'.$Type_Name.') '.$DEPD_Model;	?></td>
												<td align="center"><?php echo $SD_QTY;	?></td>
												<td align="center"><?php echo $SD_Serial;	?></td>
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
									<td width="10%"><b>หมายเหตุ: </td>
									<td width="90%"><u><?php echo $WD_Remark ?></u></td>
								</tr>
							</table><br><br>
							<p align="center">ได้ตรวจรับสินค้าตามรายการข้างบนนี้ครบถ้วนถูกต้อง</p>
							<table width="100%">
								<tr>
									<td width="50%" align="center"><b>ผู้ตรวจรับสินค้า</b><br>ลงชื่อเจ้าหน้า บริษัท เอสวีโอเอ จำกัด (มหาชน)</td>
									<td width="50%" align="center"><b>ผู้นำฝากสินค้า</b><br>ลงชื่อเจ้าหน้าที่หน่วยงาน</td>
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
