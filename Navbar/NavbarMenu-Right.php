<!-- Right Column -->
<div class="w3-col m2 w3-hide-small">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p> Remote-Case
          <table width="100%">
            <tr>
              <th width="50%"></th>
              <th style="font-size:12px" width="25%">Complete</th>
              <th style="font-size:12px" width="25%">Pending</th>
            </tr>
            <?php
            $sql_GetAcc="Select * from repair_tb where Re_Lastaction = 'Remote-Teams' group by Re_Technical_By";
            $query_GetAcc=mysqli_query($conn,$sql_GetAcc);
           
            
            while ($data_GetAcc=mysqli_fetch_array($query_GetAcc)) 
            {
              $Count_Case=0;
              $CountPending_Case_Remote=0;

                $Re_Technical_ByX = $data_GetAcc['Re_Technical_By'];

                $result_SelACC="SELECT * FROM Account_tb WHERE ACC_ID='$Re_Technical_ByX'";
                $query_SelACC=mysqli_query($conn,$result_SelACC);
                while ($data_SelACC=mysqli_fetch_array($query_SelACC)) 
                {
                  $ACC_FX = $data_SelACC['ACC_Fullname'];
                  $ACC_IDX = $data_SelACC['ACC_ID'];

                  
                $sql_GetSet="Select * from repair_tb where Re_Technical_By = '$ACC_IDX' and  Re_Status='Remote-Complete'";
                $query_GetSet=mysqli_query($conn,$sql_GetSet);
                
                while ($data_GetSet=mysqli_fetch_array($query_GetSet)) 
                {
                  $Count_Case++;
                }

                $sql_GetSetPending="Select * from repair_tb where (Re_Technical_By = '$ACC_IDX') and  (Re_Status='Assigned-Wait' or Re_Status='Remote-Pending') and Re_Lastaction = 'Remote-Teams' ";
                $query_GetSetPending=mysqli_query($conn,$sql_GetSetPending);
                
                while ($data_GetSetPending=mysqli_fetch_array($query_GetSetPending)) 
                {
                  $CountPending_Case_Remote++;
                }
                
                
                }

            ?>
            <tr>
              <td style="font-size:12px" align="left"><?php echo $ACC_FX ?></td>
              <td style="font-size:12px;color:green;"><?php echo $Count_Case ?></td>
              <td style="font-size:12px;color:red;"><?php echo $CountPending_Case_Remote ?></td>
            </tr>

            <?php } ?>

 <?php



                $Count_OncallCase = 0;
                $sql_GetSet="Select * from repair_tb where Re_Status = 'Oncall-Complete'";
                $query_GetSet=mysqli_query($conn,$sql_GetSet);
                
                while ($data_GetSet=mysqli_fetch_array($query_GetSet)) 
                {
                  $Count_OncallCase++;
                }

            ?>



            <tr>
              <td style="font-size:12px" align="left"><?php echo Oncall ?></td>
              <td style="font-size:12px;color:green;"><?php echo $Count_OncallCase ?></td>
              <td style="font-size:12px;color:red;">0</td>
            </tr>
          </table>
        
          </p>
        </div>
      </div>
      <br>
      
      
      <div class="w3-card w3-round w3-white w3-center w3-hide-small">
      <div class="w3-container">
          <p> Onsite-Case
          <table width="100%">
            <tr>
            <th width="50%"></th>
              <th style="font-size:12px" width="25%">Complete</th>
              <th style="font-size:12px" width="25%">Pending</th>
            </tr>
            <?php
            $sql_GetAcc="Select * from repair_tb where Re_Lastaction = 'Onsite-Teams' group by Re_Technical_By";
            $query_GetAcc=mysqli_query($conn,$sql_GetAcc);
            $i=0;
            while ($data_GetAcc=mysqli_fetch_array($query_GetAcc)) 
            {

                $Re_Technical_ByX = $data_GetAcc['Re_Technical_By'];

                $result_SelACC=mysqli_query($conn, "SELECT * FROM Account_tb WHERE ACC_ID='$Re_Technical_ByX'")or die('Error In Session');
                $SelACC_Result=mysqli_fetch_array($result_SelACC);
                $ACC_FX = $SelACC_Result['ACC_Fullname'];



                $ACC_FullnameX = $data_GetAcc['ACC_Fullname'];

                $sql_GetSet="Select * from repair_tb where Re_Technical_By = '$Re_Technical_ByX' and  Re_DateCreate like '$DateCut%' and Re_Status='Assigned-Complete' or Re_Status= 'Onsite-Complete'";
                $query_GetSet=mysqli_query($conn,$sql_GetSet);
                $Count_Case=0;
                while ($data_GetSet=mysqli_fetch_array($query_GetSet)) 
                {
                  $Count_Case++;
                }

                $sql_GetSetPending="Select * from repair_tb where Re_Technical_By = '$Re_Technical_ByX' and  Re_DateCreate like '$DateCut%' and Re_Status='Assigned-Wait' or Re_Status='Assigned-Pending'  or Re_Status='Onsite-Pending'";
                $query_GetSetPending=mysqli_query($conn,$sql_GetSetPending);
                $CountPending_Case=0;
                while ($data_GetSet=mysqli_fetch_array($query_GetSetPending)) 
                {
                  $CountPending_Case++;
                }

            ?>
            <tr>
              <td style="font-size:12px" align="left"><?php echo $ACC_FX ?></td>
              <td style="font-size:12px;color:green;"><?php echo $Count_Case ?></td>
              <td style="font-size:12px;color:red;"><?php echo $CountPending_Case ?></td>
            </tr>
            <?php } ?>
          </table>
        
          </p>
        </div>
      </div>
      <br>


      <div class="w3-card w3-round w3-white w3-center w3-hide-small">
      <div class="w3-container">
          <p> ISP Service-Case
          <table width="100%">
            <tr>
            <th width="50%"></th>
              <th style="font-size:12px" width="25%">Complete</th>
              <th style="font-size:12px" width="25%">Pending</th>
            </tr>
            <?php
            $sql_GetISP="Select * from repair_tb where Re_Lastaction = 'ISP-Service' group by Re_Lastaction";
            $query_GetISP=mysqli_query($conn,$sql_GetISP);
            $i=0;
            while ($data_GetISP=mysqli_fetch_array($query_GetISP)) 
            {

                $result_SelACC=mysqli_query($conn, "SELECT * FROM Account_tb WHERE ACC_Fullname='NT'")or die('Error In Session');
                $SelACC_Result=mysqli_fetch_array($result_SelACC);
                $ACC_FX = $SelACC_Result['ACC_Fullname'];



                $ACC_FullnameX = $data_GetISP['ACC_Fullname'];

                $sql_GetSet="Select * from repair_tb where  Re_DateCreate like '$DateCut%' and Re_Status='Assigned-Complete' or Re_Status= 'ISP-Complete'";
                $query_GetSet=mysqli_query($conn,$sql_GetSet);
                $Count_CaseISP=0;
                while ($data_GetSet=mysqli_fetch_array($query_GetSet)) 
                {
                  $Count_CaseISP++;
                }

                $sql_GetSetPending="Select * from repair_tb where  Re_DateCreate like '$DateCut%' and Re_Status='Assigned-Wait' or Re_Status='Assigned-Pending'  or Re_Status='ISP-Pending'";
                $query_GetSetPending=mysqli_query($conn,$sql_GetSetPending);
                $CountPending_Case=0;
                while ($data_GetSet=mysqli_fetch_array($query_GetSetPending)) 
                {
                  $CountPending_Case++;
                }

            ?>
            <tr>
              <td style="font-size:12px" align="left"><?php echo $ACC_FX ?></td>
              <td style="font-size:12px;color:green;"><?php echo $Count_CaseISP ?></td>
              <td style="font-size:12px;color:red;"><?php echo $CountPending_Case ?></td>
            </tr>
            <?php } ?>
          </table>
        
          </p>
        </div>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>Status
          <table width="100%">
            <tr>
              <td style="font-size:12px">Teams</td>
              <td style="font-size:12px">Complete</td>
              <td style="font-size:12px">Pending</td>
              <td style="font-size:12px">Out Of SLA</td>
            </tr>

            <?php
            //Remote Count All
             $sql_GetCountComplete="Select * from repair_tb where  Re_Lastaction='Remote-Teams' and Re_Status='Remote-Complete'";
             $query_GetCountComplete=mysqli_query($conn,$sql_GetCountComplete);
             $GetCountComplete_Case=0;
             while ($data_GetCountComplete=mysqli_fetch_array($query_GetCountComplete)) 
             {
               $GetCountComplete_Case++;
             } 

             $sql_GetCountPending="Select * from repair_tb where  Re_Lastaction='Remote-Teams' and Re_Status='Remote-Wait' or Re_Status='Remote-Pending'";
             $query_GetCountPending=mysqli_query($conn,$sql_GetCountPending);
             $GetCountPending_Case=0;
             while ($data_GetCountPending=mysqli_fetch_array($query_GetCountPending)) 
             {
               $GetCountPending_Case++;
             } 


             $sql_GetCountOutSLA="Select * from repair_tb where  Re_Lastaction='Remote-Teams' and Re_Status='Remote-Wait' or Re_Status='Remote-Pending'";
             $query_GetCountOutSLA=mysqli_query($conn,$sql_GetCountOutSLA);
             $GetCountOutSLA_Case=0;
             while ($data_GetCountOutSLA=mysqli_fetch_array($query_GetCountOutSLA)) 
             {  
              $Re_DateCreateOutSLA = $data_GetCountOutSLA['Re_DateCreate'];

              $CutStart = explode('/',$Re_DateCreateOutSLA);
              $DayStart = $CutStart[0];
              $MonthStart = $CutStart[1];
              $YStart = $CutStart[2];

              $CutYearstart = explode(' ',$YStart);
              $YearStart = $CutYearstart[0];
              $TimeStart = $CutYearstart[1];

              $CutTimestart = explode(':',$TimeStart);
              $HourStart = $CutTimestart[0];
              $MinStart = $CutTimestart[1];
              $SecStart = $CutTimestart[2];

              $TimeStart = $YearStart.$MonthStart.$DayStart.$HourStart.$MinStart.$SecStart;

              $Re_DateUpdateOutSLA = $data_GetCountOutSLA['Re_DateUpdate'];
              $CutEnd = explode('/',$Re_DateUpdateOutSLA);
              $DayEnd = $CutEnd[0];
              $MonthEnd = $CutEnd[1];
              $YEnd = $CutEnd[2];

              $CutYearEnd = explode(' ',$YEnd);
              $YearEnd = $CutYearEnd[0];
              $TimeEnd = $CutYearEnd[1];

              $CutTimeEnd = explode(':',$TimeEnd);
              $HourEnd = $CutTimeEnd[0];
              $MinEnd = $CutTimeEnd[1];
              $SecEnd = $CutTimeEnd[2];

              $TimeEnd = $YearEnd.$MonthEnd.$DayEnd.$HourEnd.$MinEnd.$SecEnd;

              $GetOutSLA = $TimeEnd - $TimeStart;


              if($GetOutSLA > 2000000 )
              {
                $GetCountOutSLA_Case++;
              }
             }
            ?>




            <tr>
              <td style="font-size:12px" align="left"> &nbsp;Remote</td>
              <td style="font-size:12px;color:green;"><?php echo $GetCountComplete_Case; ?></td>
              <td style="font-size:12px;color:orange;"><?php echo $GetCountPending_Case; ?></td>
              <td style="font-size:12px;color:red;"><?php echo $GetCountOutSLA_Case; ?></td>
            </tr>

            <tr>
              <td style="font-size:12px" align="left"> &nbsp;ISP-Service</td>
              <td style="font-size:12px;color:green;"><?php echo $Count_OncallCase; ?></td>
              <td style="font-size:12px;color:orange;">0</td>
              <td style="font-size:12px;color:red;">0</td>
            </tr>

            <?php
            //Onsite Count All
             $sql_GetCountCompleteOnsite="Select * from repair_tb where  Re_Lastaction='Onsite-Teams' and Re_Status='Assigned-Complete' or Re_Status= 'Onsite-Complete'";
             $query_GetCountCompleteOnsite=mysqli_query($conn,$sql_GetCountCompleteOnsite);
             $GetCountCompleteOnsite_Case=0;
             while ($data_GetCountCompleteOnsite=mysqli_fetch_array($query_GetCountCompleteOnsite)) 
             {
               $GetCountCompleteOnsite_Case++;
             } 

             $sql_GetCountPendingOnsite="Select * from repair_tb where  Re_Lastaction='Onsite-Teams' and Re_Status='Assigned-Wait' or Re_Status='Assigned-Pending' or Re_Status='Onsite-Pending'";
             $query_GetCountPendingOnsite=mysqli_query($conn,$sql_GetCountPendingOnsite);
             $GetCountPendingOnsite_Case=0;
             while ($data_GetCountPendingOnsite=mysqli_fetch_array($query_GetCountPendingOnsite)) 
             {
               $GetCountPendingOnsite_Case++;
             } 


             $sql_GetCountOutSLAOnsite="Select * from repair_tb where  Re_Lastaction='Onsite-Teams' and Re_Status='Assigned-Wait' or Re_Status='Assigned-Pending' or Re_Status='Onsite-Pending'";
             $query_GetCountOutSLAOnsite=mysqli_query($conn,$sql_GetCountOutSLAOnsite);
             $GetCountOutSLAOnsite_Case=0;
             while ($data_GetCountOutSLAOnsite=mysqli_fetch_array($query_GetCountOutSLAOnsite)) 
             {  
              $Re_DateCreateOutSLAOnsite = $data_GetCountOutSLAOnsite['Re_DateCreate'];

              $CutStartOnsite = explode('/',$Re_DateCreateOutSLAOnsite);
              $DayStartOnsite = $CutStartOnsite[0];
              $MonthStartOnsite = $CutStartOnsite[1];
              $YStartOnsite = $CutStartOnsite[2];

              $CutYearstartOnsite = explode(' ',$YStartOnsite);
              $YearStartOnsite = $CutYearstartOnsite[0];
              $TimeStartOnsite = $CutYearstartOnsite[1];

              $CutTimestartOnsite = explode(':',$TimeStartOnsite);
              $HourStartOnsite = $CutTimestartOnsite[0];
              $MinStartOnsite = $CutTimestartOnsite[1];
              $SecStartOnsite = $CutTimestartOnsite[2];

              $TimeStartOnsite = $YearStartOnsite.$MonthStartOnsite.$DayStartOnsite.$HourStartOnsite.$MinStartOnsite.$SecStartOnsite;

              $Re_DateUpdateOutSLAOnsite = $data_GetCountOutSLAOnsite['Re_DateUpdate'];
              $CutEndOnsite = explode('/',$Re_DateUpdateOutSLAOnsite);
              $DayEndOnsite = $CutEndOnsite[0];
              $MonthEndOnsite = $CutEndOnsite[1];
              $YEndOnsite = $CutEndOnsite[2];

              $CutYearEndOnsite = explode(' ',$YEndOnsite);
              $YearEndOnsite = $CutYearEndOnsite[0];
              $TimeEndOnsite = $CutYearEndOnsite[1];

              $CutTimeEndOnsite = explode(':',$TimeEndOnsite);
              $HourEndOnsite = $CutTimeEndOnsite[0];
              $MinEndOnsite = $CutTimeEndOnsite[1];
              $SecEndOnsite = $CutTimeEndOnsite[2];

              $TimeEndOnsite = $YearEndOnsite.$MonthEndOnsite.$DayEndOnsite.$HourEndOnsite.$MinEndOnsite.$SecEndOnsite;

              $GetOutSLAOnsite = $TimeEndOnsite - $TimeStartOnsite;

              if($GetOutSLAOnsite > 2000000 )
              {
                $GetCountOutSLAOnsite_Case++;
              }
             }
            ?>

            <tr>
              <td style="font-size:12px" align="left"> &nbsp;Onsite</td>
              <td style="font-size:12px;color:green;"><?php echo $GetCountCompleteOnsite_Case; ?></td>
              <td style="font-size:12px;color:orange;"><?php echo $GetCountPendingOnsite_Case; ?></td>
              <td style="font-size:12px;color:red;"><?php echo $GetCountOutSLAOnsite_Case; ?></td>
            </tr>


            <?php
            //Onsite Count All
             $sql_GetCountCompleteISP="Select * from repair_tb where  Re_Lastaction='ISP-Service' and Re_Status='ISP-Complete'";
             $query_GetCountCompleteISP=mysqli_query($conn,$sql_GetCountCompleteISP);
             $GetCountCompleteISP_Case=0;
             while ($data_GetCountCompleteISP=mysqli_fetch_array($query_GetCountCompleteISP)) 
             {
               $GetCountCompleteISP_Case++;
             } 

             $sql_GetCountPendingISP="Select * from repair_tb where  Re_Lastaction='ISP-Service' and Re_Status='Assigned-Wait' or Re_Status='Assigned-Pending' or Re_Status='ISP-Pending'";
             $query_GetCountPendingISP=mysqli_query($conn,$sql_GetCountPendingISP);
             $GetCountPendingISP_Case=0;
             while ($data_GetCountPendingISP=mysqli_fetch_array($query_GetCountPendingISP)) 
             {
               $GetCountPendingISP_Case++;
             } 


             $sql_GetCountOutSLAISP="Select * from repair_tb where  Re_Lastaction='ISP-Service' and Re_Status='Assigned-Wait' or Re_Status='Assigned-Pending' or Re_Status='ISP-Pending'";
             $query_GetCountOutSLAISP=mysqli_query($conn,$sql_GetCountOutSLAISP);
             $GetCountOutSLAISP_Case=0;
             while ($data_GetCountOutSLAISP=mysqli_fetch_array($query_GetCountOutSLAISP)) 
             {  
              $Re_DateCreateOutSLAISP = $data_GetCountOutSLAISP['Re_DateCreate'];

              $CutStartISP = explode('/',$Re_DateCreateOutSLAISP);
              $DayStartISP = $CutStartISP[0];
              $MonthStartISP = $CutStartISP[1];
              $YStartISP = $CutStartISP[2];

              $CutYearstartISP = explode(' ',$YStartISP);
              $YearStartISP = $CutYearstartISP[0];
              $TimeStartISP = $CutYearstartISP[1];

              $CutTimestartISP = explode(':',$TimeStartISP);
              $HourStartISP = $CutTimestartISP[0];
              $MinStartISP = $CutTimestartISP[1];
              $SecStartISP = $CutTimestartISP[2];

              $TimeStartISP = $YearStartISP.$MonthStartISP.$DayStartISP.$HourStartISP.$MinStartISP.$SecStartISP;

              $Re_DateUpdateOutSLAISP = $data_GetCountOutSLAISP['Re_DateUpdate'];
              $CutEndISP = explode('/',$Re_DateUpdateOutSLAISP);
              $DayEndISP = $CutEndISP[0];
              $MonthEndISP = $CutEndISP[1];
              $YEndISP = $CutEndISP[2];

              $CutYearEndISP = explode(' ',$YEndISP);
              $YearEndISP = $CutYearEndISP[0];
              $TimeEndISP = $CutYearEndISP[1];

              $CutTimeEndISP = explode(':',$TimeEndISP);
              $HourEndISP = $CutTimeEndISP[0];
              $MinEndISP = $CutTimeEndISP[1];
              $SecEndISP = $CutTimeEndISP[2];

              $TimeEndISP = $YearEndISP.$MonthEndISP.$DayEndISP.$HourEndISP.$MinEndISP.$SecEndISP;

              $GetOutSLAISP = $TimeEndISP - $TimeStartISP;

              if($GetOutSLAISP > 2000000 )
              {
                $GetCountOutSLAISP_Case++;
              }
             }
            ?>

            <tr>
              <td style="font-size:12px" align="left"> &nbsp;ISP-Service</td>
              <td style="font-size:12px;color:green;"><?php echo $GetCountCompleteISP_Case; ?></td>
              <td style="font-size:12px;color:orange;"><?php echo $GetCountPendingISP_Case; ?></td>
              <td style="font-size:12px;color:red;"><?php echo $GetCountOutSLAISP_Case; ?></td>
            </tr>


          </table>




        </p>
      </div>
      <br>
      
      <style>
      .tableFixHead {
        overflow-y: auto;
        height: 300px;
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
      }
      table {
        border-collapse: collapse;
        width: 100%;
      }

      </style>
     
      
      
      
    <!-- End Right Column -->
    </div>


    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>