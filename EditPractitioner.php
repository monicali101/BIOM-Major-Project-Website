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
		
		$p = $_GET["p"];
		$m = $_GET["m"];
		$pow = $_GET["pow"];
		
		$PID = $_GET["id"];
		echo '<br>';
		echo "<a id=\"r\" style = \"margin-left: 35px;\" class=\"button\" href=\"Practitioners.php\">  Back</a>";
		echo '<br>';
	?> 
	<br>
		<H1 style = " text-align: center; z-index: 2;" > &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Choose to edit any of the following details for this practitioner 
		</H1>
	
	<br>

    <form id="loginInfo" onSubmit = "return submitForm()" method="POST" action="EditPractitionerODBC.php?ID=<?php echo $PID?>" target = "_self"> 

            <!--////////// First name ///////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 18pt;"> 
                Edit practitioner first name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "first" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "first" value="No" > 
            </label>
            <br><br>

            <input type = "text" style = "display: none;" id = "FirstName" name = "FirstName" value = "" maxlength = "35" size = "47"
            placeholder = "&nbsp First Name" onChange = "checkFirst()" >
            <br>
            <span id = "message1"> </span> 
            <br>

            <!--////////// Last name ///////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 18pt;"> 
                Edit practitioner last name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "last" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "last" value="No" > 
            </label>
            <br><br>
 
            <input style = "display: none;" type = "text" id = "LastName" name = "LastName" value = "" maxlength = "35" size = "47"
            placeholder = "&nbsp Last Name" onChange = "checkLast()" >
            <br>
            <span id = "message2"> </span>
            <br>
			
			<!--////////// Choose what to display depending on trial/s assigned to practitioner ///////-->
			<?php
			if ($p == 1) {
			?>
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 18pt;"> 
                Remove practitioner from Parkinsons Trial &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "parkinsons" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "parkinsons" value="No" onclick="Parkinsons()"> 
            </label>
            <br><br>
			<?php			
			} else {
			?>
			<label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 18pt;"> 
                Add practitioner to Parkinsons Trial &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "parkinsons1" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "parkinsons1" value="No" onclick="Parkinsons1()"> 
            </label>
            <br><br>
			<?php
			}
			?>

			<br><br>
			<?php
			if ($m == 1) {
			?>
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 18pt;"> 
                Remove practitioner from Multiple Fallers Trial &nbsp
            <input type= "checkbox"  id = "multiple" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "multiple" value="No" onclick="Multiple()"> 
            </label>
            <br><br>
			<?php			
			} else {
			?>
			<label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 18pt;"> 
                Add practitioner to Multiple Fallers Trial &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "multiple1" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "multiple1" value="No" onclick="Multiple1()"> 
            </label>
            <br><br>
			<?php
			}
			?>
			
			<br><br>
			<?php
			if ($pow == 1) {
			?>
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 18pt;"> 
                Remove practitioner from POW Hospital Trial &nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "pow" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "pow" value="No" onclick="POW()"> 
            </label>
            <br><br>
			<?php			
			} else {
			?>
			<label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 18pt;"> 
                Add practitioner to POW Hospital Trial &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "pow1" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "pow1" value="No" onclick="POW1()"> 
            </label>
            <br><br>
			<?php
			}
			?>

            <!-- Submit -->
            <input type="submit" style="margin-top:30px; height:50px; width:340px; background-color:rgb(47, 172, 255); border: none; 
            font-weight: bold; color: white; cursor: pointer; opacity: 1;" value = "Edit Practitioner">       
            <br><br><br><br><br>

        </form>
    </div>

    <script type = "text/javascript">
   
    //////////////////// Check first, last name, dob ////////////////////
        function checkFirst() {
            var firstN = document.getElementById('FirstName').value;
            var check = /^[a-zA-Z'-\s]+$/;
            var c1 = document.getElementById("first").checked;
            if (c1 == true) {
                if (check.test(firstN)) {
                    //document.getElementById('FirstName').setAttribute("style", "margin-bottom: 0px;"); // Make sure error message doesn't move textboxes below
                    document.getElementById('message1').innerHTML = ' ';
                    return true;
                } else if (!firstN) {
                    document.getElementById('message1').innerHTML = ' ';
                    return false;
                } else {
                    //document.getElementById('FirstName').setAttribute("style", "margin-bottom: 0px;"); // Make sure error message doesn't move textboxes below
                    document.getElementById('message1').innerHTML = 'Should only contain letters, apostrophes, spaces & hyphens';
                    return false;
                }
            } else {
                document.getElementById('message1').innerHTML = ' ';
            }
        }
        function checkLast() {
            var lastN = document.getElementById('LastName').value;
            var check = /^[a-zA-Z'-\s]+$/;
            var c2 = document.getElementById("last").checked;
            if (c2 == true) {
                if (check.test(lastN)) {
                    document.getElementById('message2').innerHTML = '';
                    return true;
                } else if (!lastN) {
                    document.getElementById('message2').innerHTML = ' ';
                    return false;
                } else {
                    document.getElementById('message2').innerHTML = 'Should only contain letters, apostrophes, spaces & hyphens';
                    return false;
                }
            } else {
                document.getElementById('message2').innerHTML = ' ';
            }
        }


        // Make sure that error messages disappear if box unchecked
        document.getElementById("first").addEventListener("click", checkFirst); 
        document.getElementById("last").addEventListener("click", checkLast);


        // Check if boxes are ticked
        document.getElementById("first").addEventListener("click", First); 
        document.getElementById("last").addEventListener("click", Last); 

        ////////// Show hidden fields if boxes ticked ////////////
        function First() {
            var c1 = document.getElementById("first").checked;
            if (c1) {
                document.getElementById('FirstName').setAttribute("style", "display: inline-block;"); 
                document.getElementById('first').setAttribute("value", "Yes");   
                document.getElementById('message1').setAttribute("style", "display: inline-block; margin-bottom: 20px;");  
            } else {
                document.getElementById('FirstName').setAttribute("style", "display: none;"); 
				document.getElementById('first').setAttribute("value", "No");  
            } 
        }

        function Last() {
            var c2 = document.getElementById("last").checked;
            if (c2) {
                document.getElementById('LastName').setAttribute("style", "display: inline-block;");  
                document.getElementById('message2').setAttribute("style", "display: inline-block; margin-bottom: 20px;");  
				document.getElementById('last').setAttribute("value", "Yes");   
            } else {
                document.getElementById('LastName').setAttribute("style", "display: none;"); 
                document.getElementById('last').setAttribute("value", "No");   
            }
        }
        function Parkinsons() {
            var c3 = document.getElementById("parkinsons").checked;
            if (c3) {
				document.getElementById('parkinsons').setAttribute("value", "Yes");   
            } else {
                document.getElementById('parkinsons').setAttribute("value", "No"); 			
            } 
        }
        function Parkinsons1() {
			var c33 = document.getElementById("parkinsons1").checked;
            if (c33) {
				document.getElementById('parkinsons1').setAttribute("value", "Yes");   
            } else {
                document.getElementById('parkinsons1').setAttribute("value", "No");   
            }
        }
		
        function Multiple() {
            var c4 = document.getElementById("multiple").checked;
            if (c4) {
				document.getElementById('multiple').setAttribute("value", "Yes");   
            } else {
                document.getElementById('multiple').setAttribute("value", "No");   
            }

        }
		
        function Multiple1() {
			var c44 = document.getElementById("multiple1").checked;
            if (c44) {
				document.getElementById('multiple1').setAttribute("value", "Yes");   
            } else {
                document.getElementById('multiple1').setAttribute("value", "No");   
            }
        }
		
        function POW() {
            var c5 = document.getElementById("pow").checked;
            if (c5) {
				document.getElementById('pow').setAttribute("value", "Yes");   
            } else {
                document.getElementById('pow').setAttribute("value", "No");   
            }
        }
		
        function POW1() {
			var c55 = document.getElementById("pow1").checked;
            if (c55) {
				document.getElementById('pow1').setAttribute("value", "Yes");   
            } else {
                document.getElementById('pow1').setAttribute("value", "No");   
            }
        }

		function submitForm() {
			var c1 = document.getElementById("first").checked;
			var c2 = document.getElementById("last").checked;
			
			if (c1 == true) {
				if (checkFirst() == true) {
					firstChecked = true;
				} else {
					firstChecked = false;
				}
			} else {
				firstChecked = true;
			}
			if (c2 == true) {
				if (checkLast() == true) {
					lastChecked = true;
				} else {
					lastChecked = false;
				}
			} else {
				lastChecked = true;
			}
			
			if ((firstChecked == true) && (lastChecked == true)) {
				return true;
			} else {
				alert ("Please check that all the fields have been filled in correctly.");
				return false;
			}

		}
    </script>
</body>
</html>