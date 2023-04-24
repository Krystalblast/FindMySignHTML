<
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
	
	if (isset($_POST["find"])) {
	$firstname = $_POST["first"];
	$lastname = $_POST["last"];
	$month = $_POST["bmonth"];
	$date = $_POST["bdate"];
	$year = $_POST["byear"];
	//Check if input requires are black.
		if (!$firstname | !$lastname) {
		 die ("Please fill all information");
		}
		$checklast = mysqli_query($conn,"SELECT `Last` FROM `sign` WHERE `Last` = '$lastname'") or die (mysqli_error());
		$checklast2 = mysqli_num_rows($checklast);
		$checkfirst = mysqli_query($conn,"SELECT `First` FROM `sign` WHERE `First` = '$firstname'") or die (mysqli_error());
		$checkfirst2 = mysqli_num_rows($checkfirst);
	//Check if firtname and lastname inputs already exist. 
		if (($checklast2 && $checkfirst2)!=0) {
		die ("Sorry, lastname: ".$lastname." and firstname: ".$firstname." is already in use");
		}
		//$insert = mysqli_query($conn,"INSERT INTO `sign` (First,Last,bMonth,bDate,bYear) VALUES('$firstname','$lastname','$month','$date','$year')");
	}
	//Convert $month into integer 1-12 represent 12 months. 
	@ $array_month = array("NO","January","February","March","April","May","June","July","August","September","October","November","December");
	$nMonth=0;
	for ($i=1;$i<=12;$i++) {
		if (strcmp($month,$array_month[$i])==0) {
			$nMonth = $i;
			}
	}
	//Find reminder from the year of birth
	//Find Chinese Animal Year
	$nAnimal = $year % 12;
	$array_animal = array("Monkey","Chicken","Dog","Pig","Rat","Ox","Tiger","Rabbit","Dragon","Snack","Hose","Goat");
	$chineseSign = "something";
	
	//Find Zodiac Sign
	$array_zodiac = array("Aquarius","Pisces","Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra","Scorpio","Sagittarius","Capricorns");
	if ($nMonth == 1 ) {
		if ($date < 20){
			$nZodiac = 11;
		} else {
			$nZodiac = 0;
		}
	} else if ($nMonth == 2) {
		if ($date < 19) {
			$nZodiac = 0;
		} else {
			$nZodiac = 1;
		}
	} else if ($nMonth == 3) {
		if ($date < 21) {
			$nZodiac = 1;
		} else {
			$nZodiac = 2;
		}
	} else if ($nMonth == 4) {
		if ($date < 20) {
			$nZodiac = 2;
		} else {
			$nZodiac = 3;
		}
	} else if ($nMonth == 5) {
		if ($date < 21) {
			$nZodiac = 3;
		} else {
			$nZodiac = 4;
		}
	} else if ($nMonth == 6) {
		if ($date < 21) {
			$nZodiac = 4;
		} else {
			$nZodiac = 5;
		}
	} else if ($nMonth == 7) {
		if ($date < 23) {
			echo "Cancer";
			$nZodiac = 5;
		} else {
			$nZodiac = 6;
		}
	} else if ($nMonth == 8) {
		if ($date < 23) {
			$nZodiac = 6;
		} else {
			$nZodiac = 7;
		}
	} else if ($nMonth == 9) {
		if ($date <23) {
			$nZodiac = 7;
		} else {
			$nZodiac = 8;
		}
	} else if ($nMonth == 10) {
		if ($date < 23) {
			$nZodiac = 8;
		}
		else { 
			$nZodiac = 9;
		}
	} else if ($nMonth == 11) {
		if ($date < 22) {
			$nZodiac = 9;
		} else {
			$nZodiac = 10;
		}
	} else if ($nMonth == 12) { 
		if ($date < 22) {
			$nZodiac = 10;
		} else {
			$nZodiac = 11;
		}
		
	} else { echo "ERROR!";}
	echo "<table>";
		echo"<tr><th>".$array_zodiac[$nZodiac]."</th>";
		echo "<th>The Year of ".$array_animal[$nAnimal]."</th>";
		echo"<tr>";
		$sql1 = "SELECT `detail` FROM `zodiac` WHERE `id` = '$nZodiac'";
		$result1 = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_row($result1);
		
		$sql2 = "SELECT `detail` FROM `animal` WHERE `id` = '$nAnimal'";
		$result2 = mysqli_query($conn,$sql2);
		$row2 = mysqli_fetch_row($result2);

		echo "<tr><td align='center'><img src ='zodiac/$nZodiac.png' width='20%'></td>";
		echo "<td align='center'><img src ='animal/$nAnimal.png' width='20%'></td></tr>";
		echo "<tr><td>".$row1[0]."</td>";
		echo "<td>".$row2[0]."</td></tr>";
		
		
		$countZo = "SELECT COUNT(*) FROM `sign` WHERE `Zodiac` = '$array_zodiac[$nZodiac]'";
		$queryZo = mysqli_query($conn,$countZo);
		$rowCountZo = mysqli_fetch_row($queryZo);
						echo "<td>". $rowCountZo[0]." people have this result</td>";
		$countAn = "SELECT COUNT(*) FROM `sign` WHERE `ChineseZodiac` = '$array_animal[$nAnimal]'";
		$queryAn = mysqli_query($conn,$countAn);
		$rowCountAn = mysqli_fetch_row($queryAn);
						echo "<td>". $rowCountAn[0]." people have this result</td></tr>";
		
		echo "</table>";
		$all = mysqli_query($conn,"SELECT COUNT(*) FROM `sign`");
		$rowAll = mysqli_fetch_row($all);
		echo "The total is ".$rowAll[0]." people.";

	$insertZo = "INSERT INTO `sign` VALUES ('','$firstname','$lastname','$month','$date','$year','$array_zodiac[$nZodiac]','$array_animal[$nAnimal]')";
	mysqli_query($conn,$insertZo);
	mysqli_close($conn);
include "footer.php";?>