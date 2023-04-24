<?php 
//Connects to your Database
//("localhost", "root", "") or die(mysql_error()); 
//mysql_select_db("customers") or die(mysql_error()); 
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
//Checks if there is a login cookie
if(isset($_COOKIE['ID_my_site'])) 
//if there is, it logs you in and directs you to the members page 
{
	$username = $_COOKIE['ID_my_site']; 
	$pass = $_COOKIE['Key_my_site']; 
	$check = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'")or die(mysqli_error());
	while($info = mysqli_fetch_array( $check )) 
	{
		if ($pass != $info['password']) 
		{
			header("Location: dbtest-login.php"); 
		} else { //otherwise they are shown the admin area 
			echo "Admin Area<p>"; 
		echo "Your Content<p>"; 
			echo "<a href=logout.php>Logout</a>"; 
			}
		}
	} else { 
	//if the cookie does not exist, they are taken to the login screen 
		header("Location: dbtest-login.php");
}
?>		
		
	