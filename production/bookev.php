<?php 
require('db.php');

$evid = $_POST['evid'];
$ftime = $_POST['ftime'];
$ttime = $_POST['ttime'];
$username = $_POST['username'];

// Database connection check
if ($con) {
    echo "Connection successful";

    // Bill calculation logic
    $rate_per_hour = 50; // Assuming rate is 50 rupees per hour
    $start_time = strtotime($ftime);
    $end_time = strtotime($ttime);

    if ($end_time > $start_time) {
        $hours = ($end_time - $start_time) / 3600; // Calculate hours
        $bill_amount = $hours * $rate_per_hour;

        // Generate data for 'bills' table
        $invoice_number = 'INV-' . time() . rand(100, 999);
        $invoice_date = date('Y-m-d'); // Current date
        $order_number = 'ORD-' . $evid; // Based on event ID
        $bill_to_name = $username;
        $status = 'Pending';

        // Insert into 'booking' table
        $booking_sql = "INSERT INTO booking VALUES('', '$evid', '$ftime', '$ttime', '$username')";

        // Insert into 'bills' table
        $bills_sql = "INSERT INTO bills (username, invoice_number, invoice_date, order_number, bill_to_name, statuss, amount) 
                      VALUES ('$username', '$invoice_number', '$invoice_date', '$order_number', '$bill_to_name', '$status', '$bill_amount')";

        // Execute both queries
        if (mysqli_query($con, $booking_sql) && mysqli_query($con, $bills_sql)) {
            echo "New records created successfully";
            ?>
            <script type="text/javascript">
                window.alert("Booking and billing successful!");
                window.location = "searchev.php";
            </script>
            <?php
        } else {
            // Show MySQL error
            echo "Error: " . mysqli_error($con);
            ?>
            <script type="text/javascript">
                window.alert("Booking or billing failed!");
                window.location = "searchev.php";
            </script>
            <?php
        }
    } else {
        // Invalid time slot handling
        echo "Error: Invalid time slot.";
        ?>
        <script type="text/javascript">
            window.alert("Invalid time slot. Please check start and end times.");
            window.location = "searchev.php";
        </script>
        <?php
    }
} else {
    echo "Connection error";
}
?>
