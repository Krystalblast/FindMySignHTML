<?php include "header.php";
/*CIS 1152
*Chonsuta Drew
*Purpose: Final Project
*5/9/2019
**/
// Connects to your Database – note you may want to elaborate on the error checking as discussed in class. 
// Default username is root and no password //
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
//This code runs if the form has been submitted 
	if (isset($_POST['submit'])) {
//This makes sure they did not leave any fields blank 
		if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) { 
			die('You did not complete all of the required fields'); 
		}
		// checks if the username is in use 
		if (!get_magic_quotes_gpc()) { 
			$_POST['username'] = addslashes($_POST['username']); 
		}
		$usercheck = $_POST['username']; 
		$check = mysqli_query($conn,"SELECT username FROM users WHERE username ='$usercheck'") or die(mysqli_error()); 
		$check2 = mysqli_num_rows($check);

		//if the name exists it gives an error 
		if ($check2 != 0) { 
			die('Sorry, the username '.$_POST['username'].' is already in use.'); 
		}

		// here we encrypt the password and add slashes if needed 
		$_POST['pass'] = md5($_POST['pass']); 
		if (!get_magic_quotes_gpc()) { 
			$_POST['pass'] = addslashes($_POST['pass']); 
			$_POST['username'] = addslashes($_POST['username']); 
		}
		
		// now we insert it into the database
		$insert = "INSERT INTO users (username, password) 
		VALUES ('".$_POST['username']."', '".$_POST['pass']."')"; 
		$add_member = mysqli_query($conn,$insert);
		
		// modify this code to integrate with your own web page 
		print "<h1>Registered</h1>";
		print "<p>Thank you, you have registered - you may now login</a>.</p>";
	} else {
		
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>"; method="post"> 
<table border="0"> 
<tr><td>Username:</td><td>
<input type="text" name="username" maxlength="60"> 
</td></tr> 
<tr><td>Password:</td><td>
<input type="password" name="pass" maxlength="10"> 
</td></tr> 
<tr><td>Confirm Password:</td><td>
<input type="password" name="pass2" maxlength="10"> 
</td></tr> 
<tr><th colspan=2><input type="submit" name="submit" value="Register">
</th></tr> </table> 
</form>
<?php 
} 
include "footer.php"; ?>