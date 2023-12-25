
<script src='https://code.jquery.com/jquery-3.6.4.js'></script>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="Main-Menu.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Home</a>
  <a href="Management.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-sitemap"></i> การจัดการ</a>
  <a href="Management-Project.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-briefcase"></i> ข้อมูลโครงการ</a>
  <a href="Management-Deposit.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-cubes"></i> ข้อมูลฝากอุปกรณ์</a>
  <a href="Management-Call-Screen.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-phone-square"></i> Call-Manage</a>

  
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-desktop"></i> Call-Screen<span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="Manage-Call-Screen.php" class="w3-bar-item w3-button"><i class="fa fa-fax"></i> Call-Screen</a>
      <a href="Manage-Call-Verify.php" class="w3-bar-item w3-button"><i class="fa fa-sitemap"></i> Verifly</a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-paper-plane"></i> Remote-Teams</a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-motorcycle"></i> Onsite-Teams</a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-wifi"></i> ISP-Service</a>
    </div>
  </div>

  <!-- <form action="Sign-Out.php" method="POST">
  <button class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" name="SignOut" title="My Account"><i class="fa fa-sign-out"></i>
      Sign-Out
  </button>
  </form> -->
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="Management.php" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-sitemap"></i> การจัดการ</a>
  <a href="Management.php" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-sitemap"></i> การจัดการ</a>
  <a href="Management-Project.php" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-briefcase"></i> ข้อมูลโครงการ</a>
  <a href="Management-Deposit.php" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-cubes"></i> ข้อมูลฝากอุปกรณ์</a>
  <a href="Management-Call-Screen.php" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-phone-square"></i> Call-Manage</a>
</div>