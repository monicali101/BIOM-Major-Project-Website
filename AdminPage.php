<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
        <link rel="stylesheet" type="text/css" href="AdminPage.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Falls Prevention Association </title>

</head>
<body>
    <div>
        <?php  
		session_start();
		if (!isset($_SESSION['CheckLogin']))
			header("Location: Main.php");

        ?>
        
		
		<a id="r" style = "margin-right: 48px; margin-top: 10px" class="button3" href="Logout.php">  Logout</a>
        <span>What would you like to do?</span>

		<!-- Left button -->
        <input id = "myimage" style = "z-index: 4;" type="image" src="images/patient.png" onMouseOver="this.src='images/patient2.png'" 
        onMouseOut="this.src='images/patient.png'" onclick="subject()">
        <!-- Left text -->
        <div style = "border: none; background-color: rgb(240, 240, 255, 0); box-shadow: 0px 0px 0px 0px #424242;
        height: 200px; width: 590px; margin-left: 90px; margin-top: 510px;">
            <p>Browse subject data or assign existing subject to new practitioner.</p>
        </div>

        <!-- Right button -->
        <input id = "myimage" style = "margin-left:740px; margin-right:0px; margin-top: -220px; width: 275px;" type="image" src="images/practitioner.png" 
        onMouseOver="this.src='images/practitioner2.png'" onMouseOut="this.src='images/practitioner.png'" onclick="practitioner()">
        <!-- Right text -->
        <div style = "border: none; background-color: rgb(240, 240, 255, 0); box-shadow: 0px 0px 0px 0px #424242;
        height: 200px; width: 590px; margin-right: 90px; margin-top: 510px;">
            <p>Edit existing practitioner details or add a new practitioner.</p>
        </div>

        <!-- Make line down the middle -->
        <div style = "border-left: 6px solid black; background-color: rgb(240, 240, 255, 0); box-shadow: 0px 0px 0px 0px #424242;
        border-radius: 0px; height: 550px; width: 2px; left: 50%; margin-left: -3px; margin-top: 180px;"> </div>
    </div>

    <script type="text/javascript">
    function subject()
    {
        window.location.href = "SubjectsAdmin.php";
    }
    </script>

    <script type="text/javascript">
    function practitioner()
    {
        window.location.href = "Practitioners.php";
    }
    </script>

</body>
</html>