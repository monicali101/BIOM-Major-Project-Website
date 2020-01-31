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
	
	// Make connection
	$ID = $_POST["ID"];
	$SID = $_GET["SID"];
	$conn = odbc_connect('z5118839', '', '', SQL_CUR_USE_ODBC);
	$found = false;
	if (!$conn) {
		echo ("ODBC Connection Failed");
	}
	$sqlQuery = "SELECT * FROM Practitioner";
	$check = odbc_exec($conn, $sqlQuery);
	while (odbc_fetch_row($check)){
		$idC = odbc_result($check, "Practitioner_ID");
		if ($idC == $ID) {
			$found = true;
		}
	}
	
	if($found == true) {
		$sqlQuery0 = "UPDATE FallsRiskData_Sessions SET Practitioner_ID = '$ID' WHERE Subject_ID = $SID";
		$replace = odbc_exec($conn, $sqlQuery0);
		echo "<br><br> <h1 style = \"font-family: Time New Roman; margin-left: 0px; font-size: 30pt;\"> Subject successfully assigned to practitioner. </h1> ";
	} else {
		echo "<br><br> <h1 style = \"font-family: Time New Roman; margin-left: 0px; font-size: 30pt;\"> Practitioner with this ID does not exist. </h1> ";
	}
	?>	
		<a style = " float: none;" id="r" class="button" href="SubjectsAdmin.php">  Back to Subjects Page</a>
		
	
	
</div>
</body>
</html>