<?php include "header.php";
/*CIS 1152
*Chonsuta Drew
*Purpose: Final Project
*5/9/2019
**/?>
<table>

		<?php
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
	$table = "zodiac";
	$id = "id";
	
	$array_zodiac = array("Aquarius","Pieces","Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra","Scorpio","Sagittarius","Capricorns");
	//
	for ($i=0;$i<=2;$i++) {
		echo "<td align='center'><br><img src ='zodiac/$i.png'></td>";
		
	} 
	echo "<tr>";
	for ($j=0;$j<=2;$j++) {
	  echo "<th>".$array_zodiac[$j]."</th>";
	} 
	echo "</tr>";
	echo "<tr>";
	for ($i=0;$i<=2;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<td><p>".$row[2]."</p></td>";
	} 
	echo "</tr>";
	//
	for ($i=3;$i<=5;$i++) {
		echo "<td align='center'><br><img src ='zodiac/$i.png'></td>";
		
	} 
	echo "<tr>";
	for ($j=3;$j<=5;$j++) {
	  echo "<th>".$array_zodiac[$j]."</th>";
	} 
	echo "</tr>";
	
	echo "<tr>";
	for ($i=3;$i<=5;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<td><p>".$row[2]."</p></td>";
	} 
	echo "</tr>";
	//
	for ($i=6;$i<=8;$i++) {
		echo "<td align='center'><br><img src ='zodiac/$i.png'></td>";
		
	} 
	echo "<tr>";
	for ($j=6;$j<=8;$j++) {
	  echo "<th>".$array_zodiac[$j]."</th>";
	} 
	echo "</tr>";
	echo "<tr>";
	for ($i=6;$i<=8;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<td><p>".$row[2]."</p></td>";
	} 
	echo "</tr>";
	//
	for ($i=9;$i<=11;$i++) {
		echo "<td align='center'><br><img src ='zodiac/$i.png'></td>";
		
	} 
	echo "<tr>";
	for ($j=9;$j<=11;$j++) {
	  echo "<th>".$array_zodiac[$j]."</th>";
	} 
	echo "</tr>";
	echo "<tr>";
	for ($i=9;$i<=11;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<td><p>".$row[2]."</p></td>";
	} 
	echo "</tr>";

	//
	
	 mysqli_close($conn);
	?>
</table>
<?php include "footer.php";?>