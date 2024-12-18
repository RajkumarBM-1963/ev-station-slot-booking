<!DOCTYPE html>
<?php
include("uauth.php"); // Include auth.php file on all secure pages
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>WORLD OF EV'S! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <a href="logout.php" class="site_title" style="display: flex; align-items: center; text-decoration: none;">
        <img src="image/logo.svg" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
        <span style="font-size: 20px; font-weight: bold; color: #FFFFFF;">EV Station</span>
    </a>
            </div>
            <div class="clearfix"></div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="userdashboard.php"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a href="searchev.php"><i class="fa fa-search"></i> Search EV Station </a></li>
                  <li><a href="viewstatus.php"><i class="fa fa-laptop"></i> View Status </a></li>
                  <li><a href="sendfeed.php"><i class="fa fa-envelope"></i> Send Feedback </a></li>
                  <li><a href="viewbill.php"><i class="fa fa-file"></i> View Bill </a></li>
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
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Search Your Local Station</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form method="post" action="">
                      <div class="form-group">
                        <label for="city">Select City:</label>
                        <select class="form-control" name="city">
													<option>Choose City</option>
													<option>Mysore</option>
													<option>Banglore</option>
													<option>Manglore</option>
                          <option>Madakari</option>
												</select>

                      </div>
                      <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                  </div>
                  <?php
                    error_reporting(0);
                    $a = $_POST['city'];
                    $query = "SELECT * FROM evstation WHERE city='$a'";
                    $mysql_hostname = "localhost";
                    $mysql_user = "root";
                    $mysql_password = "";
                    $mysql_database = "ev";
                    $con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $result = mysqli_query($con, $query);
                  ?>
                  <div class="x_content">
                    <h5>Manage EV Station</h5>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">EV ID</th>
                            <th class="column-title">Station Name</th>
                            <th class="column-title">Address</th>
                            <th class="column-title">Image</th>
                            <th class="column-title">Capacity</th>
                            <th class="column-title">From Time</th>
                            <th class="column-title">To Time</th>
                            <th class="column-title">Username</th>
                            <th class="column-title">Submit</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php while ($data = mysqli_fetch_array($result)) { ?>
                          <tr class="even pointer">
                            <form action="bookev.php" method="post">
                              <td><input type="text" class="form-control" value="<?php echo $data['evid']; ?>" name="evid" readonly></td>
                              <td><?php echo $data['evname']; ?></td>
                              <td><?php echo $data['address']; ?></td>
                              <td><img src="image/<?php echo $data['image']; ?>" width="200" height="200"></td>
                              <td><?php echo $data['capacity']; ?></td>
                              <td><input type="time" name="ftime" class="form-control" required></td>
                              <td><input type="time" name="ttime" class="form-control" required></td>
                              <td><input type="text" value="<?php echo $_SESSION['username']; ?>" name="username" readonly></td>
                              <td><input type="submit" value="Submit" class="btn btn-success"></td>
                            </form>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- PHP Script for booking and bill calculation -->
        <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ftime']) && isset($_POST['ttime'])) {
    include 'db.php'; // Make sure your database connection file is included

    $evid = $_POST['evid'];
    $ftime = $_POST['ftime'];
    $ttime = $_POST['ttime'];
    $username = $_POST['username'];

    $rate_per_hour = 50; // Rate in rupees per hour
    $start_time = strtotime($ftime);
    $end_time = strtotime($ttime);

    if ($end_time > $start_time) {
        $hours = ($end_time - $start_time) / 3600; // Calculate time in hours
        $bill_amount = $hours * $rate_per_hour;

        // Generate values for bills table
        $invoice_number = 'INV-' . time() . rand(100, 999); // Unique invoice number
        $invoice_date = date('Y-m-d'); // Current date
        $order_number = 'ORD-' . $evid; // Order number based on event ID
        $bill_to_name = $username;
        $status = 'Pending';

        // Insert booking details into the database
        $booking_query = "INSERT INTO booking (evid, username, ftime, ttime, bill) 
                          VALUES ('$evid', '$username', '$ftime', '$ttime', '$bill_amount')";

        $bill_query = "INSERT INTO bills (username, invoice_number, invoice_date, order_number, bill_to_name, statuss, amount)
                       VALUES ('$username', '$invoice_number', '$invoice_date', '$order_number', '$bill_to_name', '$status', '$bill_amount')";

        if (mysqli_query($con, $booking_query) && mysqli_query($con, $bill_query)) {
            echo "<script>alert('Booking successful! Your invoice number is $invoice_number. Total bill is ₹$bill_amount.');</script>";
        } else {
            echo "<script>alert('Error: Could not book the slot. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Error: Invalid time slot. Please select valid start and end times.');</script>";
    }
}
?>


        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
      </div>
    </div>
  </body>
</html>
