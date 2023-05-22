<?php
include("include/function.php");
include("include/connect_db.php");
include("module/user/user_funtion.php");
include("module/home/home_funtion.php");
include("module/cover/cover_function.php");
include("module/detail/detail_function.php");
include("module/abouth/abouth_function.php");
include("module/aboutu/aboutu_function.php");
include("module/product/product_function.php");
include("module/food/food_function.php");
include("module/article/article_function.php");
include("module/service/service_function.php");
include("module/contact/contact_function.php");
include("module/contact_detail/contact_detail_function.php");


$module = empty($_GET['module']) ? "" : $_GET['module'];
$action = empty($_GET['action']) ? "" : $_GET['action'];
$login_name = empty($_SESSION['login_user']) ? "" : $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/x-icon" href="../images/icons/favicon.png">
  <title>ADMIN</title>

  <?php link_function_admin(); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <span class="logo"><i class="fa-solid fa-user-tie"> </i> Admin</span>
      <!-- mini logo for sidebar mini 50x50 pixels -->

      <!-- logo for regular state and mobile devices -->

      <!-- <span class="logo-lg"><img src="../images/home/logo.png"></span> -->

      </span>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Control Sidebar Toggle Button -->
            <a onclick="return confirm('คุณต้องการออกจากระบบ ?')" href="index.php?module=user&action=logout" role="button" aria-haspopup="true" aria-expanded="false">
              <li>
                <i class="fa fa-unlock" style="color: #fff;"></i>
              </li>
            </a>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <style type="text/css">
      hr.style12 {
        border: 0;
        height: 2px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(200, 147, 135, 0.75), rgba(0, 0, 0, 0));
      }
    </style>
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">

          </div>

          <div class="pull-left info" style="text-align: center;">

            <!-- <span style="color: #343434; font-weight: bold;"><?php echo $_SESSION['login_user'] ?></span> -->
          </div>
        </div>

        <ul class="sidebar-menu">
          <!-- <li class="treeview <?php echo $module == "home" || empty($module) ? 'active' : ''; ?>">
            <a href="index.php?module=home&action=home_index"><i class="menu-icon fa fa-desktop"></i><span>หน้าแรก</span></a>
          </li> -->


          <li class="treeview <?php echo $module == "cover" || empty($module) ? 'active' : ''; ?>">

            <a href="index.php?module=cover&action=cover_show"><i class="fa-regular fa-image"></i><span> รูปหน้าแรก</span></a>
          </li>

          <li class="treeview <?php echo $module == "detail" || empty($module) ? 'active' : ''; ?>">
            <a href="index.php?module=detail&action=detail_add"><i class="fa-solid fa-pen-to-square"></i><span> รายละเอียดหน้าแรก</span></a>
          </li>

          <li class="treeview <?php echo $module == "abouth" || empty($module) ? 'active' : ''; ?>">
            <a href="index.php?module=abouth&action=abouth_add"><i class="fa-solid fa-circle-info"></i><span> เกี่ยวกับส่วนแรก</span></a>
          </li>

          <li class="treeview <?php echo $module == "aboutu" || empty($module) ? 'active' : ''; ?>">
            <a href="index.php?module=aboutu&action=aboutu_show"><i class="fa-solid fa-circle-question"></i><span> เกี่ยวกับส่วนสอง</span></a>
          </li>

          <li class="treeview <?php echo $module == "product" || empty($module) ? 'active' : ''; ?>">
            <a href="index.php?module=product&action=product_show"><i class="fa-solid fa-cart-shopping"></i> <span>สินค้า</span></a>
          </li>

          <li class="treeview <?php echo $module == "food" || empty($module) ? 'active' : ''; ?>">
            <a href="index.php?module=food&action=food_show"><i class="fa-solid fa-bowl-food"></i><span> อาหาร</span></a>
          </li>

          <li class="treeview <?php echo $module == "article" || empty($module) ? 'active' : ''; ?>">
            <a href="index.php?module=article&action=article_show"><i class="fa-solid fa-paste"></i> <span>บทความ</span></a>
          </li>

          <li class="treeview <?php echo $module == "service" || empty($module) ? 'active' : ''; ?>">
            <a href="index.php?module=service&action=service_show"><i class="fa-solid fa-screwdriver-wrench"></i><span> บริการ</span></a>
          </li>

          <li class="treeview <?php echo $module == "contact" || empty($module) ? 'active' : ''; ?>">
            <a href="index.php?module=contact&action=contact_show"><i class="fa-solid fa-user"></i><span> ติดต่อ</span></a>
          </li>

          <li class="treeview <?php echo $module == "contact_detail" || empty($module) ? 'active' : ''; ?>">
            <a href="index.php?module=contact_detail&action=contact_detail_add"><i class="fa-regular fa-address-card"></i><span> ติดต่อรายละเอียด</span></a>
          </li>

          <li><a onclick="return confirm('คุณต้องการออกจากระบบ ?')" href="index.php?module=user&action=logout"><i class="fa fa-sign-out"></i><span>ออกจากระบบ</span></a></li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->
    <!-- Main content -->
    <div class="content-wrapper" style="background-color: #fff;">
      <?php
      if (!empty($module)) {
        get_module($module, $action);
      } else {
        get_module('home', 'home_index');
      }
      ?>
    </div>

  </div>
  <!-- ./wrapper -->

</body>

</html>

<!-- jQuery 2.2.3  -->
<?php script_function_admin(); ?>