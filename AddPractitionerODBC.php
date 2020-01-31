<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
        <link rel="stylesheet" type="text/css" href="AddSubject.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Falls Prevention Association </title>

</head>
<body>
<div>
	<?php
	session_start();
	if (!isset($_SESSION['CheckLogin']))
		header("Location: Main.php");
	
	// Grab form details
	$first = $_POST["FirstName"];
	$last = $_POST["LastName"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	// Make connection
	$conn = odbc_connect('z5118839', '', '', SQL_CUR_USE_ODBC);
	if (!$conn) {
		echo ("ODBC Connection Failed");
	}
	// Check for possible duplicate 
	$sqlQuery = "SELECT * FROM Practitioner";
	$check = odbc_exec($conn, $sqlQuery);
	$duplicate = false;

	while (odbc_fetch_row($check)){
		$fn = odbc_result($check, "FirstName");
		$ln = odbc_result($check, "LastName");
		$un = odbc_result($check, "Username");

		if (($fn == $first) && ($ln == $last) && ($un == $username)){
			$duplicate = true;
			echo "<br> <h1 style = \"font-family: Time New Roman; color: rgb(154, 33, 33); font-size: 40pt;\"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Error </h1> ";
			echo "<h1 style = \"line-height: 2; font-size: 25pt; padding-left: 290px; padding-right: 190px; \"> A practitioner with the same name and username date already exists in this database. Please contact system admin if you would 
			still like to add this practitioner to the datebase. </h1>";
		}
	}
	if ($duplicate == false) {
		if (isset($_POST['Parkinsons']) && $_POST['Parkinsons'] == 'Yes')  {
			$p = 1;
		} else {
			$p = 0;
		}
		if (isset($_POST['Multiple']) && $_POST['Multiple'] == 'Yes') {
			$m = 1;
		} else {
			$m = 0;
		}
		if (isset($_POST['POW']) && $_POST['POW'] == 'Yes') {
			$pow = 1;
		} else {
			$pow = 0;
		}
		$sqlQuery0 = "INSERT INTO Practitioner (FirstName, LastName, Username, Password, ParkinsonsTrial, MultipleFallersTrial, POWHospitalTrial) VALUES ('$first', '$last', '$username', '$password', '$p', '$m', '$pow')";
		$write = odbc_exec($conn, $sqlQuery0);
		echo "<br> <h1 style = \"font-family: Time New Roman; margin-left: 0px; font-size: 40pt;\"> &nbsp&nbsp&nbsp Practitioner successfully added. </h1> ";
		echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Name: ";
		echo $first . " " . $last ."</h1>";
		echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Username: ";
		echo $username ."</h1>";
		if (isset($_POST['Parkinsons']) && $_POST['Parkinsons'] == 'Yes')  {
			echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Added to Parkinsons Trial</h1>";
		}
		if (isset($_POST['Multiple']) && $_POST['Multiple'] == 'Yes') {
			echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Added to Multiple Fallers Trial</h1>";
		}
		if (isset($_POST['POW']) && $_POST['POW'] == 'Yes') {
			echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Added to POW Hospital Trial</h1>";	
		}
	}
	?>	
		<a style = " float: none;" id="r" class="button" href="Practitioners.php">  Back to Practitioners Page</a>
		
	
	
</div>
</body>
</html>