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
		
		echo '<br>';
		echo "<a id=\"r\" style = \"margin-left: 35px;\" class=\"button\" href=\"SubjectsAdmin.php\">  Back</a>";
		echo '<br>';
		$UID = $_GET["id"];
	?>
	<br>
		<H1 style = "text-align: center; " > &nbsp Please enter practitioner ID: </H1>
	
	<br>

    <form id="pracInfo" onSubmit = "return submitForm()" method="POST" action="AssignSubjectODBC.php?SID=<?php echo $UID?>" target = "_self"> 

            <!--////////// First name ///////-->

            <input type = "text" id = "ID" name = "ID" value = "" maxlength = "35" size = "42"
            placeholder = "&nbsp Practitioner ID" onChange = "checkID()" >
            <br>
            <span id = "message1"> </span> 
            <br> <br>


            <!-- Submit -->
            <input type="submit" style="margin-top:30px; height:50px; width:340px; background-color:rgb(47, 172, 255); border: none; 
            font-weight: bold; color: white; cursor: pointer; opacity: 1;" value = "Assign to Subject">       
            <br><br>

        </form>
    </div>

    <script type = "text/javascript">
   
    //////////////////// Check ID ////////////////////
        function checkID() {
            var IDp = document.getElementById('ID').value;
			if ((IDp > 0) && (IDp < 1000)) {
				document.getElementById('message1').innerHTML = ' ';
				return true;
			} else {
				document.getElementById('message1').innerHTML = 'Invalid ID';
				return false;
			}
        }
		
		function submitForm() {	
			if (checkID() == true) {
				return true;
			} else {
				alert ("Please check that all the fields in have filled in correctly.");
				return false;
			}
		}
    </script>
</body>
</html>