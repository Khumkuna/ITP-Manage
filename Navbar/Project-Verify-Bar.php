<div class="w3-card w3-round">
<div class="w3-card w3-round w3-white w3-center">
                  <div class="w3-container">
                      <h4>รอการ Verify</h4>
                      <hr>

       <table width="100%" >
      <tr align="center">
        <th>Job No.</th>
        <th>Time</th>
        <th>Select</th>
      </tr>
      <?php 
                      $sql_Si="Select * from `call-device_tb`,`Call-Project_tb`,`repair_tb` where 
                      `repair_tb`.Project_ID = `Call-Project_tb`.Project_ID and 
                      `call-device_tb`.Dev_ID = `repair_tb`.Re_Device
                      ORDER BY Re_ID DESC";
                      $query_Si=mysqli_query($conn,$sql_Si);
                      $Num = 0;$i = 0;
                      while ($data_Si=mysqli_fetch_array($query_Si))                       
                      { 
                      $Num++;$i++;
                      $Re_Job = $data_Si["Re_Job"];
                      $Project_Name = $data_Si["Project_Name"];
                      $Re_DateCreate = $data_Si["Re_DateCreate"];
                      $Dev_Model = $data_Si["Dev_Model"];
                      $Project_SLA = $data_Si["Project_SLA"];
                      $GetTimeOut = $Project_SLA / 24;
                      $Re_Serial = $data_Si["Re_Serial"];

                      $ExpTime = explode('/',$Re_DateCreate);
                      $ExpDate= $ExpTime[0]+$GetTimeOut;
                      $ExpMonth = $ExpTime[1];
                      $ExpYear = $ExpTime[2]-543;

                      $ExpHour = explode(' ',$Re_DateCreate);
                      $ExpHour= $ExpHour[1];


                      $ConDate = $ExpMonth.'/'.$ExpDate.'/'.$ExpYear.' '.$ExpHour;
                      $ShowTime = $Re_Job;

                      $new_time = date("d/m/Y H:i:s", strtotime('-'.$Project_SLA.' hours', strtotime($ConDate)));
                      
                      $month = date('M', strtotime($ConDate));
                      $Day = date('d', strtotime($ConDate));
                      $Year = date('Y', strtotime($ConDate));
                      $Time = date('H:i:s', strtotime($ConDate));
                      $TimeStart = $month.' '.$Day.', '.$Year.' '.$Time;

                      $countDownDate = "countDownDate".$i;
                      $now = "now".$i;
                      $distance = "distance".$i;
                      $days = "days".$i;
                      $hours = "hours".$i;
                      $minutes = "minutes".$i;
                      $seconds = "seconds".$i;
                      $X = "X".$i;

                      ?>
      <tr>
        <td style="font-size: 12px"><?php echo $Re_Job?></td>
        <td align="center" style="font-size: 12px"><h6 id="<?php echo $ShowTime ?>"></h6></td>
        <td style="font-size: 12px"> </td>
      </tr>  

      <script>
// Set the date we're counting down to
var <?php echo  $countDownDate ?> = new Date('<?php echo $TimeStart ?>').getTime();
// var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
var <?php echo  $X ?> = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var <?php echo  $distance ?> = <?php echo  $countDownDate ?> - now;
    
  // Time calculations for days, hours, minutes and seconds
  var <?php echo  $hours ?> = Math.floor(<?php echo  $distance ?> / (1000 * 60 * 60 ));
  // var <?php echo  $hours ?> = Math.floor((<?php echo  $distance ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var <?php echo  $minutes ?> = Math.floor((<?php echo  $distance ?> % (1000 * 60 * 60)) / (1000 * 60));
  var <?php echo  $seconds ?> = Math.floor((<?php echo  $distance ?> % (1000 * 60)) / 1000);
  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  // var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  // document.getElementById("<?php echo $ShowTime ?>").innerHTML = days + "วัน " + hours + "ชั่วโมง "
  // + minutes + "นาที " + seconds + " ";
    
  // If the count down is over, write some text 
  if(<?php echo $hours ?> > 0)
                          {
                            document.getElementById("<?php echo $ShowTime ?>").innerHTML = <?php echo $hours ?> + ":"
                            + <?php echo $minutes ?>+ ":" + <?php echo $seconds ?> +" ชม.";
                            if (<?php echo $hours ?> > 10 )
                            {
                            document.getElementById("<?php echo $ShowTime ?>").style.color="green"; 
                            }       
                            else if(<?php echo $hours ?> < 5 )
                            {
                              document.getElementById("<?php echo $ShowTime ?>").style.color="red"; 
                            }
                            else
                            {
                              document.getElementById("<?php echo $ShowTime ?>").style.color="orange"; 
                            }
                           
                          }
                          else
                          {
                            document.getElementById("<?php echo $ShowTime ?>").innerHTML = "Out Of SLA"; 
                            document.getElementById("<?php echo $ShowTime ?>").style.color="red";
                          }
                          
                           
                        }, 1000);
</script>

       <?php } ?>





      </table>
         








        </div>      
        </div>   
      </div>
      <br>



      <script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>