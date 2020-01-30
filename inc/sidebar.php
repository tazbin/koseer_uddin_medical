<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Menu</h3>
    <ul class="nav side-menu">
      <li class="<?php echo $page=='home'? active: ''; ?>" ><a href="<?php echo BASE_URL;?>/home.php"><i class="fa fa-plus-square"></i> Add patient</a></li>

      <li class="<?php echo $page=='home'? '': active; ?>" ><a><i class="fa fa-pencil-square"></i>Patient info <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo BASE_URL;?>/add-test/index.php"> <i class="fa fa-plus"></i> Add test information</a></li>
          <li><a href="<?php echo BASE_URL;?>/view-test/index.php"> <i class="fa fa-eye"></i> View Information</a></li>
          <li><a href="<?php echo BASE_URL;?>/update-patient/index.php"> <i class="fa fa-pencil-square-o"></i> Update Information</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>
