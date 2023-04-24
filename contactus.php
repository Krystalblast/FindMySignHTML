<?php include "header.php";
/*CIS 1152
*Chonsuta Drew
*Purpose: Final Project
*5/9/2019
**/?>

<div id="contact" name="contact">
<form action="contact.php" method="post">
	<h1>Contact Us</h1><br><br>
	<table>
	<tr><td><label for="first">First name <font color="red">*</font><label></td>
	<td><input type="text" name="first" required ></td>
	<tr><td><label for="last"> Last name <font color="red">*</font><label></td>
	<td><input type="text" name="last" required></td>
	<tr><td><label for="email">Email<font color="red">*</font> <label></td>
	<td><input type="text" name="email" required></td>
	<tr><td><label for="message"> Message <font color="red">*</font><label></td>
	<td><textarea name="message" rows="10" cols="30" required></textarea></td></tr>
	</table>
	 <input type="submit" name ="submit" value="Submit">
	
</form>
</div>
<?php include "footer.php";?>