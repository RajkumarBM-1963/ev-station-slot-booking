<!DOCTYPE html>
   <?php


    include("sauth.php"); //include auth.php file on all secure pages ?>

   <html lang="en">
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title> EV's Power | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
   </head>

   <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <a href="service.php" class="site_title" style="display: flex; align-items: center; text-decoration: none;">
        <img src="image/logo.svg" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
        <span style="font-size: 20px; font-weight: bold; color: #FFFFFF;">EV Station</span>
    </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
             
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['username']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="service.php"><i class="fa fa-home"></i> Dashboard </a>
                   
                  </li>
                
                 <li><a href="addEV.php"><i class="fa fa-home"></i> Add EV Station </a>
                   
                  </li>
				  
				         <li><a href="manageEv.php"><i class="fa fa-home"></i> Manage EV Station </a>
                   
                  </li>
				  
                  <li><a href="viewbooking.php"><i class="fa fa-home"></i> View Booking </a>
                   
                   </li>
                   
                  </li>
				         <li><a href="viewFeedback.php"><i class="fa fa-home"></i> View Feedback </a>
                   
                  </li>
				  
				  


				            
                
                </ul>
              </div>

            </div>
           
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  
                  <a class="dropdown-item"  href="slogout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                
              </ul>
            
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        <div class="">
        <div class="row">
        <div class="clearfix"></div>

   <div class="col-md-12 col-sm-12  ">
   <div class="x_panel">
    
   <?php
	 error_reporting(0);
	 $a=$_SESSION['username'];
	 $query="SELECT * from evstation where username='$a'" ;
   $mysql_hostname = "localhost";
   $mysql_user     = "root";
   $mysql_password = "";
   $mysql_database = "ev";
   $con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);
   if(mysqli_connect_errno())
   {
	 echo"failed to connect to MysQl: ". mysqli_connect_error();
   }
   $result = mysqli_query($con,$query); // selecting data through mysql_query()


	

   ?>
    <div class="x_content">

      <h5>Manage EV Station  </h5>

      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
          <thead>
            <tr class="headings">
            
              <th class="column-title">EV ID </th>
              <th class="column-title">Station Name </th>
              <th class="column-title">City </th>
              <th class="column-title">Address </th>
              <th class="column-title">Image </th>
              <th class="column-title">Capacity</th>
              <th class="column-title">Update</th>
              <th class="column-title">Action</th>
            
              </th>
             
          </thead>

          <tbody>
		    <?php while($data = mysqli_fetch_array($result))
       { ?>
            <tr class="even pointer">
            
              <td class=" "><?php echo $data['evid']; ?></td>
              <td class=" "><?php echo $data['evname']; ?> </td>
              <td class=" "><?php echo $data['city']; ?> </td>
              <td class=" "><?php echo $data['address']; ?></td>
              <td class=" "> <img src="image/<?php echo htmlspecialchars($data['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Image" style="max-width: 100%; height: auto;"> </td>
			         <td class=" "><?php echo $data['capacity']; ?></td>
               <td> <a href="update.php?id=<?php echo $data['evid'];?>" class="btn btn-sm btn-primary login-submit-cs" onclick="return confirm('Are You Sure')">UPDATE</td> 
               <td> <a href="vdelete.php?id=<?php echo $data['evid'];?>" class="btn btn-sm btn-primary login-submit-cs" onclick="return confirm('Are You Sure')">DELETE</td>
             
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>


    </div>
  </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
