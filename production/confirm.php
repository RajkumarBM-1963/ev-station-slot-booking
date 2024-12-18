		
<?php 
require('db.php');

$a=$_POST['bid'];
$b=$_POST['status'];




if($con){
	echo"connection successful";
	$sql="INSERT INTO confirm VALUES('$a','$b')";

	if (mysqli_query($con, $sql)) {
               echo "New record created successfully";?>
			   		<script type="text/javascript">
            window.alert("Confirmation sent successfully  ");
            window.location="viewbooking.php";
            </script>
			<?php 
            }
	else{
		echo"Record not inserted";?>
		<script type="text/javascript">
            window.alert("Confirmation sent failed ");
            window.location="viewbooking.php";
            </script>
			<?php 
	}
}
else{
	echo"connection error";

}
?>