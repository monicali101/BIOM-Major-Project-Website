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
	?>
	<br>
	 <a id="r" style = "margin-left: 35px;" class="button" href="Practitioners.php">  Back</a>
	<br><br>
	 
    <H1 style = "text-align: center; z-index: 2;"> &nbspPlease enter the following practitioner details: </H1>
    <form id="addSubjectInfo" onsubmit = "return submitForm()" method="POST" action="AddPractitionerODBC.php" target = "_self"> 
            <!-- First name -->   
            <input style = "text-align: left;" type = "text" id = "FirstName" name = "FirstName" value = "" maxlength = "35" size = "36"
            placeholder = "&nbsp First Name" onChange = "checkFirst()" required>
            <br>
            <span id = "message1"> </span>
            <br><br><br>

            <!-- Last name -->   
            <input type = "text" id = "LastName" name = "LastName" value = "" maxlength = "35" size = "36"
            placeholder = "&nbsp Last Name" onChange = "checkLast()" required>
            <br>
            <span id = "message2"> </span>
            <br><br><br>
			
            <!-- Username -->   
            <input type = "text" id = "username" name = "username" value = "" maxlength = "35" size = "36"
            placeholder = "&nbsp Username" onChange = "checkUsername()" required>
            <br>
            <span id = "message3"> </span>
            <br><br><br>
			
            <!-- Password -->   
            <input type = "text" id = "password" name = "password" value = "" maxlength = "35" size = "36"
            placeholder = "&nbsp Password" onChange = "checkPassword()" required>
            <br>
            <span id = "message4"> </span>
            <br><br><br>				
			

            <!--////////// Parkinson's ///////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Is the practitioner part of Parkinson's Trial? &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "Parkinsons" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "Parkinsons" value="No" > 
            </label>
            <br><br><br><br>

            <!--//////// Multiple Fallers ////////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Is the practitioner part of Multiple Fallers Trial? &nbsp&nbsp 
            <input type= "checkbox"  id = "Multiple" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "Multiple" value="No" > 
            </label>
            <br><br><br><br>

            <!--//////// POW ////////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Is the practitioner part of POW Hospital Trial? &nbsp&nbsp&nbsp&nbsp&nbsp 
            <input type= "checkbox"  id = "POW" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "POW" value="No" > 
            </label>
            <br><br><br><br>
            
            <!-- Submit -->
            <input type="submit" name = "submit" style="margin-top:30px; height:50px; width:340px; background-color:rgb(47, 172, 255); border: none; 
            font-weight: bold; color: white; cursor: pointer; opacity: 1;" value = "Add Practitioner" >       
            <br><br><br><br><br>

    </form>
    

    <script type = "text/javascript">
    //////////////////// Check first, last name, dob ////////////////////
        function checkFirst() {
            var firstN = document.getElementById('FirstName').value;
            var check = /^[a-zA-Z'-\s]+$/;
            if (check.test(firstN)) {
                //document.getElementById('FirstName').setAttribute("style", "margin-bottom: 0px;"); // Make sure error message doesn't move textboxes below
                document.getElementById('message1').innerHTML = ' ';
                return true;
            } else if (!firstN) {
				 document.getElementById('message1').innerHTML = '';
				 return false;
			} else {
                //document.getElementById('FirstName').setAttribute("style", "margin-bottom: 0px;"); // Make sure error message doesn't move textboxes below
                document.getElementById('message1').innerHTML = 'Should only contain letters, apostrophes, spaces & hyphens';
                return false;
            }
        }
        function checkLast() {
            var lastN = document.getElementById('LastName').value;
            var check = /^[a-zA-Z'-\s]+$/;
            if (check.test(lastN)) {
                document.getElementById('message2').innerHTML = '';
                return true;
            } else if (!lastN) {
				 document.getElementById('message2').innerHTML = '';
				 return false;
            } else {
                document.getElementById('message2').innerHTML = 'Should only contain letters, apostrophes, spaces & hyphens';
                return false;
            }
        }
         function checkUsername() {
            var username = document.getElementById('username').value;
            var check = /^[a-zA-Z_-]+$/;
            if (check.test(username)) {
                document.getElementById('message3').innerHTML = '';
                return true;
            } else if (!username) {
				 document.getElementById('message3').innerHTML = '';
				 return false;
            } else {
                document.getElementById('message3').innerHTML = 'Should only contain letters, underscores & hyphens';
                return false;
            }
        }
        function checkPassword() {
            var password = document.getElementById('password').value;
            var check = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
                if (check.test(password)) {
                    document.getElementById('message4').innerHTML = '';
                    return true;
				} else if (!password) {
					document.getElementById('message4').innerHTML = '';
					return false;
                } else {
                    document.getElementById('message4').innerHTML = 'Must include at least 8 characters, uppercase, lowercase & numbers';
                    return false;
                }
        }

        // Check if boxes are ticked
        document.getElementById("Parkinsons").addEventListener("click", parkinsons); 
        document.getElementById("Multiple").addEventListener("click", multiple); 
        document.getElementById("POW").addEventListener("click", POW); 

        ////////// If boxes ticked then replace value ////////////
        function parkinsons() {
            var c1 = document.getElementById("Parkinsons").checked;
            if (c1) {
				document.getElementById('Parkinsons').setAttribute("value", "Yes"); 
  
            } else {
				document.getElementById('Parkinsons').setAttribute("value", "No"); 
            }
           
        }

        function multiple() {
            var c2 = document.getElementById("Multiple").checked;
            if (c2) {
				document.getElementById('Multiple').setAttribute("value", "Yes"); 
            } else {
				document.getElementById('Multiple').setAttribute("value", "No"); 
            }
           
        }

        function POW() {
            var c3 = document.getElementById("POW").checked;
            if (c3) {
				document.getElementById('POW').setAttribute("value", "Yes"); 
            } else {
				document.getElementById('POW').setAttribute("value", "No"); 
            }
           
        }
		
		function submitForm(){
			if ((checkFirst() == true) && (checkLast() == true) && (checkUsername() == true) && (checkPassword() == true)) {
				return true;
			} else {
				alert ("Please check that all the fields have been filled in correctly.");
				return false;
			}
		}
    </script>
	</div>
</body>
</html>