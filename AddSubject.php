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
		$username = $_GET["un"];
		session_start();
		if (!isset($_SESSION['CheckLogin']))
			header("Location: Main.php");
	?>
	<br>
	 <a id="r" style = "margin-left: 35px;" class="button" href="Subjects.php">  Back</a>
	<br>
	 <br>
    <H1 style = "text-align: center; z-index: 2;"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbspPlease enter the following subject details: </H1>
    <form id="addSubjectInfo" onsubmit = "return submitForm()" method="POST" action="AddSubjectODBC.php?un=<?php echo $username?>" target = "_self"> 
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

            <!-- Sex --> 
            <label>Sex &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>  
            <select class="custom-select"  id = "Sex" name = "Sex" required>
                <option value="" disabled selected hidden>&nbsp Please Select...</option>
                <option value = "Male">&nbsp Male </option>
                <option value = "Female">&nbsp Female</option>
            </select>
            <br><br><br><br>
        
            <!-- DoB -->
            <label>Date of Birth &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label> 
            <input type = "date" id = "DoB" name = "DoB" value = "" onChange = "checkDoB()" required>
            <br>
            <span id = "message3"> </span>
            <br><br><br>

            <!--////////// Parkinson's ///////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Is the subject participating in Parkinson's Trial? &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "Parkinsons" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "Parkinsons" value="No" > 
            </label>
            <br>

            <!-- Test Date -->
            <label style = "display: none;" id="TestDate1" >Test Date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label> 
            <input type = "date" style = "display: none;" id = "ParkinsonsDate" name = "ParkinsonsDate" value = "" onChange = "PDateCheck()" >
            <br>
            <span id = "message4"> </span>
            <br>

            <!-- True Falls Risk -->   
            <input type = "text" style = "display: none;" id = "PTFR" name = "PTFR" value = "" maxlength = "5" size = "36"
            placeholder = "&nbsp True Falls Risk Data" onChange = "PTFRCheck()">
            <br>
            <span id = "message7"> </span>
            <bR>


            <!--//////// Multiple Fallers ////////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Is the subject participating in Multiple Fallers Trial? &nbsp&nbsp 
            <input type= "checkbox"  id = "Multiple" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "Multiple" value="No" > 
            </label>
            <br>

            <!-- Test Date -->
            <label style = "display: none;" id="TestDate2" >Test Date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label> 
            <input type = "date" style = "display: none;" id = "MultipleDate" name = "MultipleDate" value = "" onChange = "MDateCheck()">
            <br>
            <span id = "message5"> </span>
            <br>

            <!-- True Falls Risk -->   
            <input type = "text" style = "display: none;" id = "MTFR" name = "MTFR" value = "" maxlength = "5" size = "36"
            placeholder = "&nbsp True Falls Risk Data" onChange = "MTFRCheck()" >
            <br>
            <span id = "message8"> </span>
            <bR>


            <!--//////// POW ////////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Is the subject participating in POW Hospital Trial? &nbsp&nbsp&nbsp&nbsp&nbsp 
            <input type= "checkbox"  id = "POW" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "POW" value="No" > 
            </label>
            <br>

            <!-- Test Date -->
            <label style = "display: none;" id="TestDate3" >Test Date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label> 
            <input type = "date" style = "display: none;" id = "POWDate" name = "POWDate" value = "" onChange = "POWDateCheck()" >
            <br>
            <span id = "message6"> </span>
            <br>

            <!-- True Falls Risk -->   
            <input type = "text" style = "display: none;" id = "POWTFR" name = "POWTFR" value = "" maxlength = "5" size = "36"
            placeholder = "&nbsp True Falls Risk Data" onChange = "POWTFRCheck()" >
            <br>
            <span id = "message9"> </span>
            <br> <br>
            
            <!-- Submit -->
            <input type="submit" name = "submit" style="margin-top:30px; height:50px; width:340px; background-color:rgb(47, 172, 255); border: none; 
            font-weight: bold; color: white; cursor: pointer; opacity: 1;" value = "Add Subject" >       
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
				 document.getElementById('message1').innerHTML = ' ';
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
				 document.getElementById('message1').innerHTML = ' ';
				 return false;
            } else {
                document.getElementById('message2').innerHTML = 'Should only contain letters, apostrophes, spaces & hyphens';
                return false;
            }
        }
        function checkDoB() {
            var date = document.getElementById('DoB').value;
            var current = new Date();
            var min = (current.getFullYear()-18) + "-" + (current.getMonth() + 1) + "-" + current.getDate();
            var max = (current.getFullYear()-110) + "-" + (current.getMonth() + 1) + "-" + current.getDate();
            //Must be over 18 years old and younger than 118
            if ((date < min) && (date > max)) {
                document.getElementById('message3').innerHTML = '';
                return true;
            } else {
                document.getElementById('message3').innerHTML = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Invalid date';
                return false;
            }
        }


        ////////////////// Check trial dates //////////////////
        // Make sure that error messages disappear if box unchecked
        document.getElementById("Parkinsons").addEventListener("click", PDateCheck); 
        document.getElementById("Parkinsons").addEventListener("click", PTFRCheck);
        document.getElementById("Multiple").addEventListener("click", MDateCheck);
        document.getElementById("Multiple").addEventListener("click", MTFRCheck); 
        document.getElementById("POW").addEventListener("click", POWDateCheck); 
        document.getElementById("POW").addEventListener("click", POWTFRCheck);

        function PDateCheck() {
            var date = document.getElementById('ParkinsonsDate').value;
            var current = new Date();
            var today = current.getFullYear() + "-" + (current.getMonth() + 1) + "-" + current.getDate();
            var c1 = document.getElementById("Parkinsons").checked;
            // If box is checked
            if (c1 == true) {
                //Must in last 10 years or so
                if ((date <= today) && (date > "2008-01-01")) {
                    document.getElementById('message4').innerHTML = ' ';
                    return true;
                } else if (!date) {
                    document.getElementById('message4').innerHTML = ' ';
                    return false;
                } else {
                    document.getElementById('message4').innerHTML = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Invalid date';
                    return false;
                }
            } else {
                document.getElementById('message4').innerHTML = ' ';
            }
        }

        function MDateCheck() {
            var date = document.getElementById('MultipleDate').value;
            var current = new Date();
            var today = current.getFullYear() + "-" + (current.getMonth() + 1) + "-" + current.getDate();
            var c2 = document.getElementById("Multiple").checked;
            // If box is checked
            if (c2 == true) {
                //Must in last 10 years or so
                if ((date <= today) && (date > "2008-01-01")) {
                    document.getElementById('message5').innerHTML = ' ';
                    return true;
                } else if (!date) {
                    document.getElementById('message5').innerHTML = ' ';
                    return false;
                } else {
                    document.getElementById('message5').innerHTML = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Invalid date';
                    return false;
                }
            } else {
                document.getElementById('message5').innerHTML = '';
            }
        }

        function POWDateCheck() {
            var date = document.getElementById('POWDate').value;
            var current = new Date();
            var today = current.getFullYear() + "-" + (current.getMonth() + 1) + "-" + current.getDate();
            var c3 = document.getElementById("POW").checked;
            // If box is checked
            if (c3 == true) {
                if ((date <= today) && (date > "2008-01-01")) {
                    document.getElementById('message6').innerHTML = ' ';
                    return true;
                } else if (!date) {
                    document.getElementById('message6').innerHTML = ' ';
                    return false;
                } else {
                    document.getElementById('message6').innerHTML = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Invalid date';
                    return false;
                }
            } else {
                document.getElementById('message6').innerHTML = '';
            }
        }

        ///////// Check true falls risk data ////////////
        function PTFRCheck() {
            var data = document.getElementById('PTFR').value;
            var c1 = document.getElementById("Parkinsons").checked;
            if (c1 == true) {
                if ((data >= -5) && (data <= 5)) {
                    document.getElementById('message7').innerHTML = ' ';
                    document.getElementById('message7').setAttribute("style", "display: inline-block; margin-bottom: 40px;");  
                    return true;
                } else if (!data) {
                    document.getElementById('message7').innerHTML = ' ';
                    document.getElementById('message7').setAttribute("style", "display: inline-block; margin-bottom: 40px;");  
                    return false;
                } else {
                    document.getElementById('message7').setAttribute("style", "display: inline-block; margin-bottom: 26px;");  
                    document.getElementById('message7').innerHTML = 'True falls risk value has to be between -5 and 5 (inclusive)';
                    return false;
                }
            } else {
                document.getElementById('message7').innerHTML = '';
                document.getElementById('message7').setAttribute("style", "margin-bottom: 0px;");
            }
        }

        function MTFRCheck() {
            var data = document.getElementById('MTFR').value;
            var c2 = document.getElementById("Multiple").checked;
            if (c2 == true) {
                if ((data >= -5) && (data <= 5)) {
                    document.getElementById('message8').innerHTML = ' ';
                    document.getElementById('message8').setAttribute("style", "display: inline-block; margin-bottom: 40px;");  
                    return true;
                } else if (!data) {
                    document.getElementById('message8').innerHTML = ' ';
                    document.getElementById('message8').setAttribute("style", "display: inline-block; margin-bottom: 40px;");  
                    return false;
                } else {
                    document.getElementById('message8').setAttribute("style", "display: inline-block; margin-bottom: 26px;");  
                    document.getElementById('message8').innerHTML = 'True falls risk value has to be between -5 and 5 (inclusive)';
                    return false;
                }
            } else {
                document.getElementById('message8').innerHTML = '';
                document.getElementById('message8').setAttribute("style", "margin-bottom: 0px;");
            }
        }

        function POWTFRCheck() {
            var data = document.getElementById('POWTFR').value;
            var c3 = document.getElementById("POW").checked;
            if (c3 == true) {
                if ((data >= -5) && (data <= 5)) {
                    document.getElementById('message9').innerHTML = ' ';
                    document.getElementById('message9').setAttribute("style", "display: inline-block; margin-bottom: 20px;"); 
                    return true; 
                } else if (!data) {
                    document.getElementById('message9').innerHTML = ' ';
                    document.getElementById('message9').setAttribute("style", "display: inline-block; margin-bottom: 20px;"); 
                    return false;                    
                } else {
                    document.getElementById('message9').setAttribute("style", "display: inline-block; margin-bottom: 6px;");  
                    document.getElementById('message9').innerHTML = 'True falls risk value has to be between -5 and 5 (inclusive)';
                    return false;
                }   
            } else {
                document.getElementById('message9').innerHTML = ' ';
                document.getElementById('message9').setAttribute("style", "margin-bottom: 0px;");
            }        
        }

        // Check if boxes are ticked
        document.getElementById("Parkinsons").addEventListener("click", parkinsons); 
        document.getElementById("Multiple").addEventListener("click", multiple); 
        document.getElementById("POW").addEventListener("click", POW); 

        ////////// Show hidden fields if boxes ticked ////////////
        function parkinsons() {
            var c1 = document.getElementById("Parkinsons").checked;
            if (c1) {
				document.getElementById('Parkinsons').setAttribute("value", "Yes"); 
                document.getElementById('ParkinsonsDate').setAttribute("style", "display: inline-block;"); 
                document.getElementById('TestDate1').setAttribute("style", "display: inline-block; margin-top: 30px; margin-bottom: 0px;");  
                document.getElementById('PTFR').setAttribute("style", "display: inline-block;  margin-top: 30px; margin-bottom: 0px;");  
                document.getElementById('message7').setAttribute("style", "display: inline-block; margin-bottom: 40px;");  
            } else {
				document.getElementById('Parkinsons').setAttribute("value", "No"); 
                document.getElementById('ParkinsonsDate').setAttribute("style", "display: none;"); 
                document.getElementById('TestDate1').setAttribute("style", "display: none; margin-bottom: 0px;"); 
                document.getElementById('PTFR').setAttribute("style", "display: none; margin-bottom: 0px;"); 
            }
           
        }

        function multiple() {
            var c2 = document.getElementById("Multiple").checked;
            if (c2) {
				document.getElementById('Multiple').setAttribute("value", "Yes"); 
                document.getElementById('MultipleDate').setAttribute("style", "display: inline-block;"); 
                document.getElementById('TestDate2').setAttribute("style", "display: inline-block; margin-top: 30px; margin-bottom: 0px;");  
                document.getElementById('MTFR').setAttribute("style", "display: inline-block; margin-top: 30px; margin-bottom: 0px;");
                document.getElementById('message8').setAttribute("style", "display: inline-block; margin-bottom: 40px;");  
            } else {
				document.getElementById('Multiple').setAttribute("value", "No"); 
                document.getElementById('MultipleDate').setAttribute("style", "display: none;"); 
                document.getElementById('TestDate2').setAttribute("style", "display: none;"); 
                document.getElementById('MTFR').setAttribute("style", "display: none; margin-bottom: 0px;"); 
            }
           
        }

        function POW() {
            var c3 = document.getElementById("POW").checked;
            if (c3) {
				document.getElementById('POW').setAttribute("value", "Yes"); 
                document.getElementById('POWDate').setAttribute("style", "display: inline-block;"); 
                document.getElementById('TestDate3').setAttribute("style", "display: inline-block; margin-top: 30px; margin-bottom: 0px;");  
                document.getElementById('POWTFR').setAttribute("style", "display: inline-block; margin-top: 30px; margin-bottom: 0px;");  
                document.getElementById('message9').setAttribute("style", "display: inline-block; margin-bottom: 20px;"); 
            } else {
				document.getElementById('POW').setAttribute("value", "No"); 
                document.getElementById('POWDate').setAttribute("style", "display: none;"); 
                document.getElementById('TestDate3').setAttribute("style", "display: none; "); 
                document.getElementById('POWTFR').setAttribute("style", "display: none; margin-bottom: 0px;"); 
            }
           
        }
		function submitForm(){
			var c1 = document.getElementById("Parkinsons").checked;
			var c2 = document.getElementById("Multiple").checked;
			var c3 = document.getElementById("POW").checked;
			var pChecked = false;
			var mChecked = false;
			var powChecked = false;
			
			if (c1 == true) {
				if ((PDateCheck() == true) && (PTFRCheck() == true)) {
					pChecked = true;
				} else {
					pChecked = false;
				}
			} else {
				pChecked = true;
			}
			if (c2 == true) {
				if ((MDateCheck() == true) && (MTFRCheck() == true)) {
					mChecked = true;
				} else {
					mChecked = false;
				}
			} else {
				mChecked = true;
			}
			if (c3 == true) {
				if ((POWDateCheck() == true) && (POWTFRCheck() == true)) {
					powChecked = true;
				} else {
					powChecked = false;
				}
			} else {
				powChecked = true;
			}
			
			if ((pChecked == true) && (mChecked == true) && (powChecked == true) && (checkFirst() == true) && (checkLast() == true) && (checkDoB() == true)) {
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