<?php
$db="ev";
$user="root";
$pass="";
$server="localhost";
$a = $_GET['id'];



$con=mysqli_connect($server,$user,$pass,$db);
if($con){
	
	$sql="delete from evstation where evid='$a'";
	if($con->query($sql)===TRUE){
		echo"Record deleted";?>
		<script type="text/javascript">
            window.alert("EV Station  successfully Deleted");
            window.location="viewevstation.php";
            </script>
			<?php 
}else{
	echo"connection error";
}
}
?>