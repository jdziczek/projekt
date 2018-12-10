      <div id="header" class="w3-bar w3-theme w3-xlarge">
        <p>
          <i class="fa fa-bars w3-button w3-blue w3-hide-large w3-xlarge" onclick="showSideBar()"></i>
          <span id="header_text">JBD Logistics
            <?php 
            if((isset($_SESSION['login'])))
            {
              echo "- Witaj ";
              echo $_SESSION['login'];
              echo "!";
            }
            ?>
          </span>
        </p>
      </div>