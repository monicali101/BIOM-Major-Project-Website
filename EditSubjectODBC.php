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
	$conn = odbc_connect('z5118839', '', '', SQL_CUR_USE_ODBC);
	if (!$conn) {
		echo ("ODBC Connection Failed");
	}
	$sqlQuery = "SELECT * FROM Subject";
	$search = odbc_exec($conn, $sqlQuery);
	// Grab form details
	if (isset($_POST['first']) && $_POST['first'] == 'Yes')  {
		$first = $_POST["FirstName"];	
		$sqlQuery = "UPDATE Subject SET FirstName = '$first' WHERE Subject_ID = $ID";
		$replace = odbc_exec($conn, $sqlQuery);
		$c1 = true;
	}
	if (isset($_POST['last']) && $_POST['last'] == 'Yes') {
		$last = $_POST["LastName"];
		$sqlQuery0 = "UPDATE Subject SET LastName = '$last' WHERE Subject_ID = $ID";
		$replace0 = odbc_exec($conn, $sqlQuery0);
		$c2 = true;
	}
	if (isset($_POST['dob']) && $_POST['dob'] == 'Yes') {
		$dob = $_POST["DoB"];
		$dobR = explode("-", $dob);
		$DoB = $dobR[2] . "/" . $dobR[1]. "/" . $dobR[0];
		$sqlQuery1 = "UPDATE Subject SET BirthDate = '$DoB' WHERE Subject_ID = $ID";
		$replace1 = odbc_exec($conn, $sqlQuery1);
		$c3 = true;
	}
	if (isset($_POST['sex']) && $_POST['sex'] == 'Yes') {
		$sex = $_POST["Sex"];
		if ($sex == "Female"){
			$gender = "f";
		} else {
			$gender = "m";
		}
		$sqlQuery2 = "UPDATE Subject SET Sex = '$gender' WHERE Subject_ID = $ID";
		$replace2 = odbc_exec($conn, $sqlQuery2);
		$c4 = true;
	}
	if (isset($_POST['tfr']) && $_POST['tfr'] == 'Yes') {
		$tfr = $_POST["TFR"];
		$sqlQuery3 = "UPDATE FallsRiskData_Sessions SET TrueFallsRisk = '$tfr' WHERE Subject_ID = $ID";
		$replace3 = odbc_exec($conn, $sqlQuery3);
		$c5 = true;
	}
	if (isset($_POST['date']) && $_POST['date'] == 'Yes') {
		$date = $_POST["Date"];
		$dateR = explode("-", $date);
		$Date = $dateR[2] . "/" . $dateR[1]. "/" . $dateR[0];
		$sqlQuery4 = "UPDATE FallsRiskData_Sessions SET TestDate = '$Date' WHERE Subject_ID = $ID";
		$replace4 = odbc_exec($conn, $sqlQuery4);
		$c6 = true;
	}
	if (($c1 == true) || ($c2 == true) || ($c3 == true) || ($c4 == true) || ($c5 == true) || ($c6 == true) ) {
		echo "<br><br> <h1 style = \"font-family: Time New Roman; margin-left: 0px; font-size: 30pt;\"> Subject details successfully updated. </h1> ";
	} else {
		echo "<br><br> <h1 style = \"font-family: Time New Roman; margin-left: 0px; font-size: 30pt;\"> No changes were made to subject details. </h1> ";
	}
	echo "<br>";
	?>	
		<a style = " float: none;" id="r" class="button" href="Subjects.php">  Back to Subjects Page</a>
		
	
	
</div>
</body>
</html>