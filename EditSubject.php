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
	
		
		$UID = $_GET["id"];
		echo '<br>';
		echo "<a id=\"r\" style = \"margin-left: 35px;\" class=\"button\" href=\"Subjects.php\">  Back</a>";
		echo '<br>';
	?>
		<br>
		<H1 style = "text-align: center; z-index: 2;" > &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Choose to edit any of the following details for subject 
		
		<?php echo $UID;?>
		</H1>
	
	<br>

    <form id="loginInfo" onSubmit = "return submitForm()" method="POST" action="EditSubjectODBC.php?ID=<?php echo $UID?>" target = "_self"> 

            <!--////////// First name ///////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Edit subject first name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "first" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "first" value="No" > 
            </label>
            <br><br>

            <input type = "text" style = "display: none;" id = "FirstName" name = "FirstName" value = "" maxlength = "35" size = "42"
            placeholder = "&nbsp First Name" onChange = "checkFirst()" >
            <br>
            <span id = "message1"> </span> 
            <br>

            <!--////////// Last name ///////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Edit subject last name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "last" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "last" value="No" > 
            </label>
            <br><br>
 
            <input style = "display: none;" type = "text" id = "LastName" name = "LastName" value = "" maxlength = "35" size = "42"
            placeholder = "&nbsp Last Name" onChange = "checkLast()" >
            <br>
            <span id = "message2"> </span>
            <br>

            <!--////////// DoB  ///////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Edit subject date of birth &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "dob" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "dob" value="No" > 
            </label>
            <br><br>

            <!-- DoB -->
            <label style = "display: none;" id = "dobLabel" > Date of Birth &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label> 
            <input style = "display: none;" type = "date" id = "DoB" name = "DoB" value = "" onChange = "checkDoB()">
            <br>
            <span id = "message3"> </span>
            <br>

            <!--////////// Sex  ///////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Edit subject sex &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "sex" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "sex" value="No" > 
            </label>
            <br><br>

            <label style = "display: none;" id = "sexLabel">Sex &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>  
            <select style = "display: none;" id = "Sex" class="custom-select"  name = "Sex" >
                <option value="" disabled selected hidden>&nbsp Please Select...</option>
                <option value = "Male">&nbsp Male </option>
                <option value = "Female">&nbsp Female</option>
            </select>
            <br><br>

            <!--////////// True Falls Risk  ///////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Edit subject true falls risk data &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "tfr" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "tfr" value="No" > 
            </label>
            <br><br>

            <input  type = "text" style = "display: none;" id = "TFR" name = "TFR" value = "" maxlength = "5" size = "42"
            placeholder = "&nbsp True Falls Risk Data" onChange = "TFRCheck()">
            <br>
            <span id = "message4"> </span>
            <br>

            <!--////////// TFR test date  ///////-->
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Edit subject test date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "date" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "date" value="No" > 
            </label>
            <br><br>

            <label style = "display: none;" id = "dateLabel" > Date of test &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label> 
            <input style = "display: none;" type = "date" id = "Date" name = "Date" value = "" onChange = "DateCheck()" >
            <br>
            <span id = "message5"> </span>
            <br>

<!--             <!--////////// Parkinsons  ///////
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Add subject to Parkinsons Trial &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "parkinsons" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "parkinsons" value="No" > 
            </label>
            <br><br><br><br>

            <!--////////// Multiple  ///////
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Add subject to Multiple Fallers Trial &nbsp
            <input type= "checkbox"  id = "multiple" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "multiple" value="No" > 
            </label>
            <br><br><br><br>

            <!--////////// POW  ///////
            <label style = "width: 680px; font-weight: bold; font-family: Calibri, Times, serif; font-size: 20pt;"> 
                Add subject to POW Trial &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type= "checkbox"  id = "pow" style = "width: 17px; height: 17px; padding: 0; margin:0; vertical-align: bottom; 
            position: relative; top: -5px;" name = "pow" value="No" > 
            </label>
            <br><br><br> -->

            <!-- Submit -->
            <input type="submit" style="margin-top:30px; height:50px; width:340px; background-color:rgb(47, 172, 255); border: none; 
            font-weight: bold; color: white; cursor: pointer; opacity: 1;" value = "Edit Subject">       
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
        function checkDoB() {
            var date = document.getElementById('DoB').value;
            var current = new Date();
            var min = (current.getFullYear()-18) + "-" + (current.getMonth() + 1) + "-" + current.getDate();
            var max = (current.getFullYear()-110) + "-" + (current.getMonth() + 1) + "-" + current.getDate();
            var c3 = document.getElementById("dob").checked;
            //Must be over 18 years old and younger than 118
            if (c3 == true) {
                if ((date < min) && (date > max)) {
                    document.getElementById('message3').innerHTML = '';
                    return true;
                } else if (!date) {
                    document.getElementById('message3').innerHTML = ' ';
                    return false;
                } else {
                    document.getElementById('message3').innerHTML = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Invalid date';
                    return false;
                }
            } else {
                document.getElementById('message3').innerHTML = '';
            }
        }
        function checkSex() {
			var c8 = document.getElementById("sex").checked;
			var sex = document.getElementById('Sex').value;

			if (c8 == true) {
				if ((sex == "Male") || (sex == "Female")) {
					return true;
				} else {
					return false;
				}
			} else {
				return true;
			}
		}
        function DateCheck() {
            var date = document.getElementById('Date').value;
            var current = new Date();
            var today = current.getFullYear() + "-" + (current.getMonth() + 1) + "-" + current.getDate();
            var c4 = document.getElementById("date").checked;
            // If box is checked
            if (c4 == true) {
                //Must in last 10 years or so
                if ((date <= today) && (date > "2008-01-01")) {
                    document.getElementById('message5').innerHTML = ' ';
                    return true;
                } else if (!date) {
                    document.getElementById('message5').innerHTML = ' ';
                    return false;
                } else {
                    document.getElementById('message5').innerHTML = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Invalid date';
                    return false;
                }
            } else {
                document.getElementById('message5').innerHTML = ' ';
            }
        }

        ///////// Check true falls risk data ////////////
        function TFRCheck() {
            var data = document.getElementById('TFR').value;
            var c1 = document.getElementById('tfr').checked;
			
            if (c1 == true) {
                if ((data >= -5) && (data <= 5) && (data != "")) {
                    document.getElementById('message4').innerHTML = ' ';
                    document.getElementById('message4').setAttribute("style", "display: inline-block; margin-bottom: 40px;");  
					return true;
                } else if (!data) {
                    document.getElementById('message4').innerHTML = ' ';
                    document.getElementById('message4').setAttribute("style", "display: inline-block; margin-bottom: 40px;");  
                    return false;
                } else {
                    document.getElementById('message4').setAttribute("style", "display: inline-block; margin-bottom: 26px;");  
                    document.getElementById('message4').innerHTML = 'True falls risk value has to be between -5 and 5 (inclusive)';
                    return false;
                }
            } else {
                document.getElementById('message4').innerHTML = '';
                document.getElementById('message4').setAttribute("style", "margin-bottom: 0px;");
            }
        }

        // Make sure that error messages disappear if box unchecked
        document.getElementById("first").addEventListener("click", checkFirst); 
        document.getElementById("last").addEventListener("click", checkLast);
        document.getElementById("dob").addEventListener("click", checkDoB);
        document.getElementById("tfr").addEventListener("click", TFRCheck);
        document.getElementById("date").addEventListener("click", DateCheck);

        // Check if boxes are ticked
        document.getElementById("first").addEventListener("click", First); 
        document.getElementById("last").addEventListener("click", Last); 
        document.getElementById("dob").addEventListener("click", DoB); 
        document.getElementById("sex").addEventListener("click", sex); 
        document.getElementById("tfr").addEventListener("click", TFR); 
        document.getElementById("date").addEventListener("click", DateC); 
		document.getElementById("parkinsons").addEventListener("click", park); 
		document.getElementById("multiple").addEventListener("click", mult); 
		document.getElementById("pow").addEventListener("click", poww); 
        

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

        function DoB() {
            var c3 = document.getElementById("dob").checked;
            if (c3) {
                document.getElementById('DoB').setAttribute("style", "display: inline-block;"); 
                document.getElementById('dobLabel').setAttribute("style", "display: inline-block;"); 
                document.getElementById('dob').setAttribute("value", "Yes"); 
                document.getElementById('message3').setAttribute("style", "display: inline-block; margin-bottom: 20px;");  
            } else {
                document.getElementById('DoB').setAttribute("style", "display: none;"); 
                document.getElementById('dobLabel').setAttribute("style", "display: none;"); 
                document.getElementById('dob').setAttribute("value", "No"); 
            }
        }

        function sex() {
            var c4 = document.getElementById("sex").checked;
            if (c4) {
                document.getElementById('Sex').setAttribute("style", "display: inline-block;"); 
                document.getElementById('sexLabel').setAttribute("style", "display: inline-block;"); 
                document.getElementById('sex').setAttribute("value", "Yes"); 
            } else {
                document.getElementById('Sex').setAttribute("style", "display: none;"); 
                document.getElementById('sexLabel').setAttribute("style", "display: none;"); 
                document.getElementById('sex').setAttribute("value", "No"); 
            } 
        }

        function TFR() {
            var c5 = document.getElementById("tfr").checked;
            if (c5) {
                document.getElementById('TFR').setAttribute("style", "display: inline-block;"); 
                document.getElementById('tfr').setAttribute("value", "Yes"); 
            } else {
                document.getElementById('TFR').setAttribute("style", "display: none;"); 
                document.getElementById('tfr').setAttribute("value", "No"); 
            } 
        }

        function DateC() {
            var c6 = document.getElementById("date").checked;
            if (c6) {
                document.getElementById('Date').setAttribute("style", "display: inline-block;");
                document.getElementById('dateLabel').setAttribute("style", "display: inline-block;");  
                document.getElementById('message5').setAttribute("style", "display: inline-block; margin-bottom: 20px;");
				document.getElementById('date').setAttribute("value", "Yes"); 
            } else {
                document.getElementById('Date').setAttribute("style", "display: none;"); 
                document.getElementById('dateLabel').setAttribute("style", "display: none;"); 
                document.getElementById('message3').setAttribute("style", "display: inline-block; margin-bottom: -40px;");
				document.getElementById('date').setAttribute("value", "No"); 
            } 
        }
		
        function park() {
            var c7 = document.getElementById("parkinsons").checked;
            if (c7) {
                document.getElementById('parkinsons').setAttribute("value", "Yes"); 
            } else {
                document.getElementById('parkinsons').setAttribute("value", "No"); 
            } 
        }
        function mult() {
            var c8 = document.getElementById("multiple").checked;
            if (c8) {
                document.getElementById('multiple').setAttribute("value", "Yes"); 
            } else {
                document.getElementById('multiple').setAttribute("value", "No"); 
            } 
        }
		
        function poww() {
            var c8 = document.getElementById("pow").checked;
            if (c8) {
                document.getElementById('pow').setAttribute("value", "Yes"); 
            } else {
                document.getElementById('pow').setAttribute("value", "No"); 
            } 
        }
		function submitForm() {
			var c1 = document.getElementById("first").checked;
			var c2 = document.getElementById("last").checked;
			var c3 = document.getElementById("dob").checked;
			var c4 = document.getElementById("sex").checked;
			var c5 = document.getElementById("tfr").checked;
			var c6 = document.getElementById("date").checked;
			var firstChecked = false;
			var lastChecked = false;
			var dobChecked = false;
			var sexChecked = false;
			var tfrChecked = false;
			var dateChecked = false;
			
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
			if (c3 == true) {
				if (checkDoB() == true) {
					dobChecked = true;
				} else {
					dobChecked = false;
				}
			} else {
				dobChecked = true;
			}
			if (c4 == true) {
				if (checkSex() == true) {
					sexChecked = true;
				} else {
					sexChecked = false;
				}
			} else {
				sexChecked = true;
			}
			if (c5 == true) {
				if (TFRCheck() == true) {
					tfrChecked = true;
				} else {
					tfrChecked = false;
				}
			} else {
				tfrChecked = true;
			}
			if (c6 == true) {
				if (DateCheck() == true) {
					dateChecked = true;
				} else {
					dateChecked = false;
				}
			} else {
				dateChecked = true;
			}
			
			if ((firstChecked == true) && (lastChecked == true) && (dobChecked == true) && (sexChecked == true) && (tfrChecked == true) && (dateChecked == true)) {
				return true;
			} else {
				alert ("Please check that all the fields have been filled in correctly.");
				return false;
			}
		}
    </script>
</body>
</html>