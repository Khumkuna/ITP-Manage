          <div class="w3-col m2">
                <div class="w3-card w3-round w3-white w3-center">
                  <div class="w3-container">
                      <h6>ยี่ห้อ อุปกรณ์</h6>
                      <table width="100%">
                        
                        <?php
                        $sql_Brand="Select * from Brand_tb ORDER BY Brand_ID ASC";
                        $query_Brand=mysqli_query($conn,$sql_Brand);
                        $SiteCode = 0;
                        while ($data_Brand=mysqli_fetch_array($query_Brand))                       
                        { 
                          $SiteCode++;
                          $Brand_ID = $data_Brand["Brand_ID"];
                          $Brand_Name = $data_Brand["Brand_Name"];
                          $Brand_Logo = $data_Brand["Brand_Logo"];
                        ?>
                        <tbody>
                          <tr>
                            <td> <img src="<?php echo $Brand_Logo ?>" style="width:30px"> </td>
                            <td align="left"><?php echo $Brand_Name ?></td>

                                  <form action="" method="POST">
                                    <input type="text" hidden  id="Brand_ID" name="Brand_ID" value="<?php echo $Brand_ID ?>"></p>
                                    <td align="center" >
                                    <button  class="btn" name="BrandDelete"><i class="fa fa-trash"></i></button>
                                    </td>
                                  </form>


                          </tr>
                        </tbody>
                        <?php 
                        } ?>
                      </table><br>


          
        </div>
      </div>
      <br>


      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">

      <div class="w3-container">
                      <h6>ประเภท อุปกรณ์</h6>
                      <table width="100%">
                        <?php
                        $sql_Type="Select * from Type_tb ORDER BY Type_ID ASC";
                        $query_Type=mysqli_query($conn,$sql_Type);
                        $SiteCode = 0;
                        while ($data_Type=mysqli_fetch_array($query_Type))                       
                        { 
                          $SiteCode++;
                          $Type_ID = $data_Type["Type_ID"];
                          $Type_Name = $data_Type["Type_Name"];
                          $Type_Logo = $data_Type["Type_Logo"];
                        ?>
                        <tbody>
                          <tr>
                            <td align="left"><?php echo $Type_Name ?></td>

                                  <form action="" method="POST">
                                    <input type="text" hidden  id="Type_ID" name="Type_ID" value="<?php echo $Type_ID ?>"></p>
                                    <td align="center" >
                                    <button  class="btn" name="TypeDelete"><i class="fa fa-trash"></i></button>
                                    </td>
                                  </form>


                          </tr>
                        </tbody>
                        <?php 
                        } ?>
                      </table><br>

       
      
                      </div>
      
      
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
      
    <!-- End Right Column -->
    </div>