
<!-- Modal AP-->
<div class="modal fade" id="Select-Serial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายการ Serial Number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <style>
            #myTableAA {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #myTableAA td, #myTableAA th {
            border: 1px solid #ddd;
            padding: 5px;
            }

            #myTableAA tr:nth-child(even){background-color: #f2f2f2;}

            #myTableAA tr:hover {background-color: #ddd;}

            #myTableAA th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #42899B;
            color: white;
            }
            </style>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
              function myFunctionAA() {
              var input, filter, table, tr, td, i;
                input = document.getElementById("myInputAA");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTableAA");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                  td = tr[i].getElementsByTagName("td")[0]; // for column one
                  td1 = tr[i].getElementsByTagName("td")[1]; // for column two
                  td2 = tr[i].getElementsByTagName("td")[2]; // for column two

              /* ADD columns here that you want you to filter to be used on */
                  if (td) {
                    if ( 
                    (td1.innerHTML.toUpperCase().indexOf(filter) > -1)|| 
                    (td2.innerHTML.toUpperCase().indexOf(filter) > -1)
                    
                    )  {            
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }
                }
              } 
      </script>


        <input class="form-control" type="text" id="myInputAA" onkeyup="myFunctionAA()" placeholder="ค้นหา..." title="Type in a name">

    <table id="myTableAA">
            <tr >
              <th align="center">Box No.</th>
              <th colspan="2" align="center">Serial Number</th>

            </tr>
            <?php 
            $sql_ShowSerial="Select * from `call-serial_tb` where Dev_ID = '$Device_Selected'";
            $query_ShowSerial=mysqli_query($conn,$sql_ShowSerial);
            $ShowSerial=0;
            while ($data_ShowSerial=mysqli_fetch_array($query_ShowSerial)) {
              $Ser_Box = $data_ShowSerial['Ser_Box'];
              $Ser_Serial_Second = $data_ShowSerial['Ser_Serial_Second'];
              $Ser_ID = $data_ShowSerial['Ser_ID'];
            ?>
            <tr>

              <td><?php echo $Ser_Box ?></td>
              <td><?php echo $Ser_Serial_Second ?></td>
              <td align="center">
                <form action="Manage-Call-Screen.php" method="POST">


                <input type="text" name="Project_ID_Selected" class="form-control"  id="Project_ID_Selected" hidden  value="<?php echo $Project_ID_Selected ?>">
                <input type="text" name="Device_Selected" class="form-control"  id="Device_Selected" hidden  value="<?php echo $Dev_ID_Selected ?>">
                <input type="text" name="Ser_ID_Selected" class="form-control"  id="Ser_ID_Selected" hidden value="<?php echo $Ser_ID ?>">
                <button class="w3-button w3-theme-d1 w3-margin-bottom-sm" id="Selected_Serial"  name="Selected_Serial"><i class="fa fa-check-square-o"></i></button>
                </form>
              </td>

            </tr>
            <?php } ?>
      </table>





					

      </div>
      <div class="modal-footer">
			<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

