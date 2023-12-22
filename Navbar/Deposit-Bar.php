<div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus-square-o fa-fw w3-margin-right"></i> สร้างรายการฝาก</button>
          <div id="Demo1" class="w3-hide w3-container">

            <form action="Management-Create-Deposit.php" method="POST">
             <button class="w3-button w3-block w3-theme-l2 w3-left-align"><i class="fa fa-plus fa-fw w3-margin-right"></i> สร้างรายการฝาก</button>
            </form>
            <form action="Management-Deposit-All.php" method="POST">
                    <button class="w3-button w3-block w3-theme-l2 w3-left-align"><i class="fa fa-archive fa-fw w3-margin-right"></i> รายการฝากทั้งหมด</button>
                </form>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus-square-o fa-fw w3-margin-right"></i> เบิกอุปกรณ์</button>
              <div id="Demo2" class="w3-hide w3-container">
                <form action="Management-Create-Withdraw-Deposit.php" method="POST">
                    <button class="w3-button w3-block w3-theme-l2 w3-left-align"><i class="fa fa-plus fa-fw w3-margin-right"></i> สร้างรายการเบิก</button>
                </form>
                <form action="Management-Withdraw-All.php" method="POST">
                    <button class="w3-button w3-block w3-theme-l2 w3-left-align"><i class="fa fa-archive fa-fw w3-margin-right"></i> รายการเบิกทั้งหมด</button>
                </form>
            </div>

            <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus-square-o fa-fw w3-margin-right"></i> เพิ่ม-รับคืนอุปกรณ์</button>
              <div id="Demo3" class="w3-hide w3-container">
                <form action="Management-Addon-Device.php" method="POST">
                    <button class="w3-button w3-block w3-theme-l2 w3-left-align"><i class="fa fa-plus fa-fw w3-margin-right"></i> เพิ่มอุปกรณ์ (เพิ่มจากเดิม)</button>
                </form>
                <form action="Management-Create-Receive.php" method="POST">
                    <button class="w3-button w3-block w3-theme-l2 w3-left-align"><i class="fa fa-plus fa-fw w3-margin-right"></i> รับคืนสินค้า (ทดแทน)</button>
                </form>
                <form action="Management-Receive-All.php" method="POST">
                    <button class="w3-button w3-block w3-theme-l2 w3-left-align"><i class="fa fa-archive fa-fw w3-margin-right"></i> รายการรับคืนทั้งหมด</button>
                </form>
            </div>

          
          <button onclick="myFunction('Demo4')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-eye fa-fw w3-margin-right"></i> View</button>
          <div id="Demo4" class="w3-hide w3-container">
            <p>Some other text..</p>
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