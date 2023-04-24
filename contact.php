<?php include "header.php";
/*CIS 1152
*Chonsuta Drew
*Purpose: Final Project
*5/9/2019
**/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "findmysign";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['submit'])) { 
	$value = array("first","last","email","message");
	$insert[0] = $_POST['first'];
	$insert[1] = $_POST['last'];
	$insert[2] = $_POST['email'];
	$insert[3] = $_POST['message'];
	if (!$insert[0]) {
		die ('You did not fill in a required field.');
		}
	else {
		mysqli_query($conn,"INSERT `contact` ($value[0]) VALUES ('$insert[0]')");
	}
	for ($i=1;$i<=3;$i++) {
		if (!$insert[$i]) {
			die ('You did not fill in a required field.');
		}
		mysqli_query($conn,"UPDATE`contact` SET `$value[$i]` = '$insert[$i]' WHERE `$value[0]` = '$insert[0]'");
	}
} else {
	die ('Could not access database');
}

echo "Thank You!";

include "footer.php";?>