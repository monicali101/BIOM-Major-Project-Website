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
	$ID = $_GET["ID"];
	session_start();
	if (!isset($_SESSION['CheckLogin']))
		header("Location: Main.php");
		
	// Make connection
	$c1 = false;
	$c2 = false;
	$c3 = false;
	$c4 = false;
	$c5 = false;
	$c6 = false;
	$c7 = false;
	$c8 = false;
	$FALSE = 0;
	$TRUE = 1;
	$conn = odbc_connect('z5118839', '', '', SQL_CUR_USE_ODBC);
	if (!$conn) {
		echo ("ODBC Connection Failed");
	}
	$sqlQuery = "SELECT * FROM Practitioner";
	$search = odbc_exec($conn, $sqlQuery);
	// Grab form details
	if (isset($_POST['first']) && $_POST['first'] == 'Yes')  {
		$first = $_POST["FirstName"];	
		$sqlQuery = "UPDATE Practitioner SET FirstName = '$first' WHERE Practitioner_ID = $ID";
		$replace = odbc_exec($conn, $sqlQuery);
		$c1 = true;
	}
	if (isset($_POST['last']) && $_POST['last'] == 'Yes') {
		$last = $_POST["LastName"];
		$sqlQuery0 = "UPDATE Practitioner SET LastName = '$last' WHERE Practitioner_ID = $ID";
		$replace0 = odbc_exec($conn, $sqlQuery0);
		$c2 = true;
	}
	if (isset($_POST['parkinsons']) && $_POST['parkinsons'] == 'Yes') {
		$sqlQuery1 = "UPDATE Practitioner SET ParkinsonsTrial = '$FALSE' WHERE Practitioner_ID = $ID";
		$replace1 = odbc_exec($conn, $sqlQuery1);
		$c3 = true;
	} 
	if (isset($_POST['parkinsons1']) && $_POST['parkinsons1'] == 'Yes') {
		$sqlQuery2 = "UPDATE Practitioner SET ParkinsonsTrial = '$TRUE' WHERE Practitioner_ID = $ID";
		$replace2 = odbc_exec($conn, $sqlQuery2);
		$c4 = true;
	}
	if (isset($_POST['parkinsons']) && $_POST['parkinsons'] == 'Yes') {
		$sqlQuery1 = "UPDATE Practitioner SET ParkinsonsTrial = '$FALSE' WHERE Practitioner_ID = $ID";
		$replace1 = odbc_exec($conn, $sqlQuery1);
		$c3 = true;
	} 
	if (isset($_POST['parkinsons1']) && $_POST['parkinsons1'] == 'Yes') {
		echo ("ddddd");
		$sqlQuery2 = "UPDATE Practitioner SET ParkinsonsTrial = '$TRUE' WHERE Practitioner_ID = $ID";
		$replace2 = odbc_exec($conn, $sqlQuery2);
		$c4 = true;
	}
 	if (isset($_POST['multiple']) && $_POST['multiple'] == 'Yes') {
		$sqlQuery3 = "UPDATE Practitioner SET MultipleFallersTrial = '$FALSE' WHERE Practitioner_ID = $ID";
		$replace3 = odbc_exec($conn, $sqlQuery3);
		$c5 = true;
	} 
	if (isset($_POST['multiple1']) && $_POST['multiple1'] == 'Yes') {
		$sqlQuery4 = "UPDATE Practitioner SET MultipleFallersTrial = '$TRUE' WHERE Practitioner_ID = $ID";
		$replace4 = odbc_exec($conn, $sqlQuery4);
		$c6 = true;
	}
	if (isset($_POST['pow']) && $_POST['pow'] == 'Yes') {
		$sqlQuery5 = "UPDATE Practitioner SET POWHospitalTrial = '$FALSE' WHERE Practitioner_ID = $ID";
		$replace5 = odbc_exec($conn, $sqlQuery5);
		$c7 = true;
	} 
	if (isset($_POST['pow1']) && $_POST['pow1'] == 'Yes') {
		$sqlQuery6 = "UPDATE Practitioner SET POWHospitalTrial = '$TRUE' WHERE Practitioner_ID = $ID";
		$replace6 = odbc_exec($conn, $sqlQuery6);
		$c8 = true;
	} 


	if (($c1 == true) || ($c2 == true) || ($c3 == true) || ($c4 == true) || ($c5 == true) || ($c6 == true) || ($c7 == true) || ($c8 == true) ) {
		echo "<br><br> <h1 style = \"font-family: Time New Roman; margin-left: 0px; font-size: 30pt;\"> Practitioner details successfully updated. </h1> ";
	} else {
		echo "<br><br> <h1 style = \"font-family: Time New Roman; margin-left: 0px; font-size: 30pt;\"> No changes were made to practitioner details. </h1> ";
	}
	echo "<br>";
	?>	
		<a style = " float: none;" id="r" class="button" href="Practitioners.php">  Back to Practitioners Page</a>
		
	
	
</div>
</body>
</html>