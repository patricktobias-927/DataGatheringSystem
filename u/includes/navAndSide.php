 <?php 
ob_start();
 function isActive($page, $navtitle)
{
	if ($page == $navtitle) {
		echo "active";		
	}
	else{
		echo "";
	}
}
function treeOpen($page, $navtitle)
{
	if (strpos($page, $navtitle)) {
		echo "menu-open";		
	}
	else{
		echo "";
	}
}
 function titlePage($page)
{
	echo SCHOOL_NAME . " ~ " . SCHOOL_ADDRESS;
}
  require '../include/getschoolyear.php';

 ?>


 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">        
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $page.".php"?>" class="nav-link nav-link-2"><?php titlePage('page');?></a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <strong class="nav-link-special ">S.Y. <?php echo $schoolYear ?> - Admin</strong>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">

          <i class="fa fa-user"></i>
          <!-- <span class="badge badge-warning navbar-badge">15</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="../index.php?logout" type="button" class="btn btn-block btn-outline-danger ">
          Log Out <i class="fa fa-sign-out-alt"></i></a>
        </div>  
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <span class="brand-link">
      <img src="../assets/imgs/pphlogohq.png" alt="PPH" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light title-right">PPH | DGS</span>
    </span>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-child-indent nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php isActive($page,"index");?>">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Change School Year
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php treeOpen($page,"info");?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt" aria-hidden="true"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../u/studentinfo.php" class="nav-link <?php isActive($page,"studentinfo");?>">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Filter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../u/exportpage.php" class="nav-link">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Export</p>
                </a>
              </li>
             
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>