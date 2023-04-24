<?php include "header.php"
/*CIS 1152
*Chonsuta Drew
*Purpose: Final Project
*5/9/2019
**/;?>
<table>
<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("p").hide();
  });
  $("#show").click(function(){
    $("p").show();
  });
});
</script>
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
$table = "animal";
$id = "id";
	
	////
for ($j=4;$j<=6;$j++) {
	  echo "<td align='center'><br><img src ='animal/$j.png' id='demo'></td>";
	} 

	echo "<tr>";
	for ($i=4;$i<=6;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<th><p>The Year of ".$row[1]."</p></th>";
	} 
	echo "</tr>";
	echo "<tr>";
	for ($i=4;$i<=6;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<td><p>".$row[2]."</p></td>";
	} 
	echo "</tr>";
	/////
	echo"<tr>";
	for ($j=7;$j<=9;$j++) {
	  echo "<td align='center'><br><img src ='animal/$j.png'></td>";
	}
	echo "</tr>
			<tr>";
	for ($i=7;$i<=9;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<th>The Year of ".$row[1]."</th>";
	} 
	echo "</tr>";
	echo "<tr>";
	for ($i=7;$i<=9;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo"<td><p>".$row[2]."</p></td>";
	} 
	echo "</tr>";
	//
	for ($j=10;$j<=11;$j++) {
	  echo "<td align='center'><br><img src ='animal/$j.png'></td>";
	}
	echo "<td align='center'><br><img src ='animal/0.png'></td>";
	
	echo "<tr>";
	for ($i=10;$i<=11;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<th>The Year of ".$row[1]."</th>";
	} 
	echo "<th>The Year of Monkey</th>";
	echo "</tr>";
	echo "<tr>";
		for ($i=10;$i<=11;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<td>".$row[2]."</td>";
	} 
		$sql = "SELECT * FROM `$table` WHERE `$id` = '0'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<td>".$row[2]."</td>";

	echo "</tr>";
	//
	for ($j=1;$j<=3;$j++) {
	  echo "<td align='center'><br><img src ='animal/$j.png'></td>";
	}
	
	echo "<tr>";
	for ($i=1;$i<=3;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<th>The Year of ".$row[1]."</th>";
	} 
	echo "</tr>";
	echo "<tr>";
	for ($i=1;$i<=3;$i++) {
		$sql = "SELECT * FROM `$table` WHERE `$id` = '$i'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		echo "<td>".$row[2]."</td>";
	} 
	echo "</tr>";
	 //
	 mysqli_close($conn);
	?>
</table>
<?php include "footer.php";?>