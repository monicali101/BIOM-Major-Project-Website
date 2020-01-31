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
	$un = $_GET["un"];
	session_start();
	if (!isset($_SESSION['CheckLogin']))
		header("Location: Main.php");
	//$_SESSION['fromAdd'] = $un;
	// Grab form details
	$first = $_POST["FirstName"];
	$last = $_POST["LastName"];
	$sex = $_POST["Sex"];
	if ($sex == "Female"){
		$gender = "f";
	} else {
		$gender = "m";
	}
	$dob = $_POST["DoB"];
	$dobR = explode("-", $dob);
	$DoB = $dobR[2] . "/" . $dobR[1]. "/" . $dobR[0];
	$parkinsons = "Parkinsons_Trial";
	$multiple = "Multiple_Fallers_Trial";
	$poww = "POW_Hospital_Trial";
	
	// Make connection
	$conn = odbc_connect('z5118839', '', '', SQL_CUR_USE_ODBC);
	if (!$conn) {
		echo ("ODBC Connection Failed");
	}
	// Check for possible duplicate 
	$sqlQuery = "SELECT * FROM Subject";
	$check = odbc_exec($conn, $sqlQuery);
	$duplicate = false;
	$DoBCheck = $dobR[0] . "-" . $dobR[1]. "-" . $dobR[2];
	$DoBCheck = $DoBCheck . " " . "00:00:00";
	while (odbc_fetch_row($check)){
		$fn = odbc_result($check, "FirstName");
		$ln = odbc_result($check, "LastName");
		$bday = odbc_result($check, "BirthDate");
/* 		echo $DoBCheck;
		echo " ";
		echo $bday;
		echo "<br>"; */
		if (($fn == $first) && ($ln == $last) && ($bday == $DoBCheck)){
			$duplicate = true;
			echo "<br> <h1 style = \"font-family: Time New Roman; color: rgb(154, 33, 33); font-size: 40pt;\"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspError </h1>";
			echo "<h1 style = \"line-height: 2; font-size: 25pt; padding-left: 290px; padding-right: 190px; \"> A subject with the same name and birth date already exists in this database. Please contact system admin if you would 
			still like to add this subject to the datebase. </h1>";
		}
	}
	if ($duplicate == false) {
		// Grab practitioner ID
		$sqlQuery0 = "SELECT * FROM Practitioner";
		$getID = odbc_exec($conn, $sqlQuery0);
		while (odbc_fetch_row($getID)){
			$username = odbc_result($getID, "Username");
			if ($username == $un) {
				$pracID = odbc_result($getID, "Practitioner_ID");
			}
		}
		// Grab highest subject ID and increment
		$sqlQuery1 = "SELECT * FROM Subject";
		$newID = odbc_exec($conn, $sqlQuery1);
		while (odbc_fetch_row($newID)){
			$highestID = odbc_result($newID, "Subject_ID");
		}
		$highestID = $highestID + 1;;
		// Add subject details into Subject table
		$sqlQuery2 = "INSERT INTO Subject (Subject_ID, FirstName, LastName, BirthDate, Sex) VALUES ('$highestID', '$first', '$last', '$DoB', '$gender')";
		$add = odbc_exec($conn, $sqlQuery2);
		
		// Check if Trial data has been included as well
		if (isset($_POST['Parkinsons']) && $_POST['Parkinsons'] == 'Yes')  {
			$pDate = $_POST["ParkinsonsDate"];
			$ptfr = $_POST["PTFR"];
			$sqlQuery3 = "INSERT INTO FallsRiskData_Sessions (TestDate, Trial, Subject_ID, SubjectBirthDate, TrueFallsRisk, Practitioner_ID) VALUES ('$pDate', '$parkinsons', '$highestID', '$DoB', '$ptfr', '$pracID')";
			$addP = odbc_exec($conn, $sqlQuery3);
		}
		if (isset($_POST['Multiple']) && $_POST['Multiple'] == 'Yes') {
			$mDate = $_POST["MultipleDate"];
			$mtfr = $_POST["MTFR"];
			$sqlQuery4 = "INSERT INTO FallsRiskData_Sessions (TestDate, Trial, Subject_ID, SubjectBirthDate, TrueFallsRisk, Practitioner_ID) VALUES ('$mDate', '$multiple', '$highestID', '$DoB', '$mtfr', '$pracID')";
			$addM = odbc_exec($conn, $sqlQuery4);
		}
		if (isset($_POST['POW']) && $_POST['POW'] == 'Yes') {
		
			$powDate = $_POST["POWDate"];
			$powtfr = $_POST["POWTFR"];
			$sqlQuery5 = "INSERT INTO FallsRiskData_Sessions (TestDate, Trial, Subject_ID, SubjectBirthDate, TrueFallsRisk, Practitioner_ID) VALUES ('$powDate', '$poww', '$highestID', '$DoB', '$powtfr', '$pracID')";
			$addPOW = odbc_exec($conn, $sqlQuery5);
		}
		echo "<br> <h1 style = \"font-family: Time New Roman; margin-left: 0px; font-size: 40pt;\"> Subject successfully added. </h1> ";
		echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Name: ";
		echo $first . " " . $last ."</h1>";
		echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Sex: ";
		echo $sex ."</h1>";
		echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Date of Birth: ";
		echo $DoB ."</h1>";
		if (isset($_POST['Parkinsons']) && $_POST['Parkinsons'] == 'Yes')  {
			echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Added to Parkinsons Trial with true falls risk of ";
			echo $ptfr . "</h1>";
		}
		if (isset($_POST['Multiple']) && $_POST['Multiple'] == 'Yes') {
			echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Added to Multiple Fallers Trial with true falls risk of ";
			echo $mtfr . "</h1>";
		}
		if (isset($_POST['POW']) && $_POST['POW'] == 'Yes') {
			echo "<h1 style = \"line-height: 1; font-size: 17pt; margin-left: 0px; padding-left: 90px; padding-right: 90px; \"> Added to POW Hospital Trial with true falls risk of ";
			echo $powtfr . "</h1>";		
		}
	}
	?>	<br>
		<a style = " float: none;" id="r" class="button" href="Subjects.php">  Back to Subjects Page</a>
		
	
	
</div>
</body>
</html>