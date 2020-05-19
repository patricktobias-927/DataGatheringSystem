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
 function titlePage()
{
	echo SCHOOL_NAME;
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
        <b class="text-secondary"><h3><?php titlePage();?></h3></b>
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
    <span class="brand-link ">
      <img  src="<?PHP echo "../".SCHOOL_LOGO_PATH?>" alt="<?PHP echo SCHOOL_ABV?>" class="brand-image img-circle elevation-3"
           style="opacity: .8;">
      <span class="brand-text font-weight-light title-right lead"><?PHP echo SCHOOL_ABV?> | PRISM</span>
    </span>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-child-indent nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php isActive($page,'index'); ?>">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="adminchangepass.php" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="adminchangeschoolyear.php" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Change School Year
              </p>
            </a>
          </li> -->
 
          <li class="nav-item has-treeview <?php treeOpen($page,"disable");?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bullhorn" aria-hidden="true"></i>
              <p>
                Announcements
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="publishA.php" class="nav-link <?php isActive($page,"AddAnnouncement");?>">
                  <i class="nav-icon fa fa-pencil-alt"></i>
                  <p>Add Announcement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viewAllAnnouncement.php" class="nav-link <?php isActive($page,"viewallAnnouncement");?>">
                  <i class="nav-icon fa fa-bullseye"></i>
                  <p>View Announcements</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php treeOpen($page,"disable");?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt" aria-hidden="true"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../u/filterreport.php" class="nav-link <?php isActive($page,"filterreport");?>">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Filter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../u/exportpage.php" class="nav-link <?php isActive($page,"exportpage");?>">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Export</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php treeOpen($page,"disable");?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog" aria-hidden="true"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="adminchangepass.php" class="nav-link <?php isActive($page,"adminchangepass");?>">
                  <i class="nav-icon fa fa-lock"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="adminchangeschoolyear.php" class="nav-link <?php isActive($page,"adminchangeschoolyear");?>">
                  <i class="nav-icon fa fa-calendar"></i>
                  <p>Change School Year</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>