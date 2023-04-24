<?php include "header.php";
/*CIS 1152
*Chonsuta Drew
*Purpose: Final Project
*5/9/2019
**/
	//connect database
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
	
	$sql = "sth";
	$query = "sth";
	$search = $_POST["input"];
	
	if(isset($_POST["pick"])) {
		if ($_POST["pick"] == "name") {
			$sql = "SELECT * FROM `sign` WHERE `First` = '$search'";
		}
		else if($_POST["pick"] == "zodiac") {
			$sql = "SELECT * FROM `sign` WHERE `Zodiac` = '$search'";
		}
		else if($_POST["pick"] == "animal") {
			$sql = "SELECT * FROM `sign` WHERE `ChineseZodiac` = '$search'";
		} 
		
	} else {
		die ('Please check one radio button');
		}
	
	$query = mysqli_query($conn,$sql); 

	if (!$query) {
		die('<b>Could not acces data<b>');
	}
	else {
		echo "<div align='center';><table>
			<th>First</th>
			<th>Last</th>
			<th>Month</th>
			<th>Date</th>
			<th>Year</th>
			<th>Zodiac</th>
			<th>ChineseZodiac</th>";
			echo "<tr>";
		while($row = mysqli_fetch_row($query)) {
			
			for($i=1;$i<=7;$i++) {
				echo "<td align='center';>".$row[$i]."</td>";
			}
			echo "</tr>";	
		}
	}
	echo "</table></div>"; ?>
	<form action="login.php">
         <button type="submit">Back to Search</button>
      </form>
	
<?php include "footer.php";?>