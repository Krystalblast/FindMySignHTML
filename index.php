<?php include "header.php";
/*CIS 1152
*Chonsuta Drew
*Purpose: Final Project
*5/9/2019
**/?>
<p align="center">Enter your name and birthday and click "Find My Sign".</p>
<div class="form1">
 
<form action="sign.php" method="post">
	<label for="first">First name<label>
	<input type="text" name="first"><br><br>
	<label for="last">Last name<label>
	<input type="text" name="last"><br><br>
	<b>Birhday</b><br><br>
	<label for="month">Month<label>
	<input list="month" name="bmonth">
	 <datalist id="month">
        <option value="January">
        <option value="February">
        <option value="March">
        <option value="April">
        <option value="May">
        <option value="June">
        <option value="July">
        <option value="August">
		<option value="September">
        <option value="October">
        <option value="November">
        <option value="December">
     </datalist>
	 <label for="bdate">Date<label>
	<input type="number" name="bdate" min="1" max="31">
	 <label for="byear">Year<label>
	<input type="number" name="byear" min="1900" max="2500">
	 <br>
	 <br>
	<input type ="submit" name="find" value="FIND MY SIGN">
	</form>
</div>
<?php include "footer.php";?>
