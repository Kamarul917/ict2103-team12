<?php
if (empty($_SESSION['admin'])){?>
<link rel="stylesheet" href="css/footer.css">  
<!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <h6>ICT2103 - Team 12</h6>
            <p class="text-justify"><i>iCovidTravel</i> is a school project on ICT2103 - Information Management. It will be used to provide people with a guideline for safe traveling. 
                <br>Team Members: Kamarullah (2002773), Lim Zheng Jie (2000627), Shawn Lim (2001544), Ang Wei Jie (2002124), Teo Nian Kiat (2001373)</p>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
         <a href="#">ICT2103 - Team 12</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="navbar-nav float-right">
              <li class="nav-item"><a class="nav-link" style="color:white" href="admin_login.php">Admin Login</a></li> 
            </ul>
          </div>
        </div>
      </div>
</footer>
<?php }else{ ?>
<link rel="stylesheet" href="css/footer.css">  
<!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <h6>ICT2103 - Team 12</h6>
            <p class="text-justify"><i>iCovidTravel</i> is a school project on ICT2103 - Information Management. It will be used to provide people with a guideline for safe traveling. 
                <br>Team Members: Kamarullah (2002773), Lim Zheng Jie (2000627), Shawn Lim (2001544), Ang Wei Jie (2002124), Teo Nian Kiat (2001373)</p>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
         <a href="#">ICT2103 - Team 12</a>.
            </p>
          </div>
        </div>
      </div>
</footer>
<?php } ?>