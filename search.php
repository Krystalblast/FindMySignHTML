<?php include "header.php";
/*CIS 1152
*Chonsuta Drew
*Purpose: Final Project
*5/9/2019
**/?>
<form action="result.php" method="post">

<label for="first">Search By<label><br><br>
	<input type="radio" name="pick" value="name" checked > Name 
	<input type="radio" name="pick" value="zodiac"> Zodiac
	<input type="radio" name="pick" value="animal"> Chinese Zodiac <br><br>
	<input type="text" name="input"><br><br>
	<input type ="submit" name="search" value="SEARCH">
	<br>
	<br>
	</form>
	
 <form action="logout.php">
         <button type="submit">Log Out</button><br>
    </form>
	  <br>
	  <br>

<?php include "footer.php";?>