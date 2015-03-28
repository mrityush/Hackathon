<!DOCTYPE html>
<html>
<?php include 'header.php';?>
<form action="authenticate.php" method=post>
	<input id="emailId" type="email" name = "email" placeholder="Enter email"> <input
		id="passwordId" type="password" name = "password" placeholder="Enter Password">
	<td><button type="submit"">Go</button></td>
</form>
<?php include 'footer.php';?>
</html>