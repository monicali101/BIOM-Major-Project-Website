<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
        <link rel="stylesheet" type="text/css" href="css.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Falls Prevention Association </title>

</head>
<body>        
        <img src="images/logo.png" style="width:12%;">

        <div>
            <br><br><br><br><br><br><br><br>            
        
        <form id="registrantInfo" onSubmit = "return submit()" method="POST" action="Subjects.php" target = "blank"> 
            <!-- Username -->   
            <input type = "text" id = "username" name = "username" value = "" maxlength = "35" size = "36"
            placeholder = "&nbsp Username" onChange = "adminCheck()" required>
        
            <!-- Password -->
            <input type = "password" id = "Password" name = "Password" value = "" maxlength = "35" size = "36"
            placeholder = "&nbsp Password" onChange = "validPassword()" required>
            <br>

            <!-- Admin access -->
            <label for="Login as admin" id="admin"><input type= "checkbox"  style = "width: 17px; height: 17px; padding: 0; margin:0;
            vertical-align: bottom; position: relative; top: -5px; *overflow: hidden;" name = "subscribe" value="" > &nbsp Login as admin
            </label>
            
            <!-- Login -->
            <input type="submit" style="margin-top:40px; height:50px; width:340px; background-color:rgb(47, 172, 255); border: none; 
            font-weight: bold; color: white; cursor: pointer; opacity: 1;" value = "LOGIN">       

        </form>
    </div>

    <script type = "text/javascript">
        // If detected username has admin authority, give option to login as admin
        function adminCheck() {
            var username = document.getElementById('Username').value;
            if (username == "yo") {
                 document.getElementById('admin').setAttribute("style", "display: block;");      
            } else {
                document.getElementById('admin').setAttribute("style", "display: none;"); 
            }
           
        }
        function submit() {
            // if (validEmail() ==  true && validPassword() == true && validCheck() == true && checkFirst()==true && 
            //     checkLast()==true && checkDoB()==true) {
            //     return true;
            // } 
        }
    </script>
     <?php
         	$conn = odbc_connect('z5118839', '', '', SQL_CUR_USE_ODBC);
            if(!$conn){
                echo "<script type='text/javascript'>alert('not connected');</script>";
			} 
			$username = $_POST['username'];
			echo "<script type='text/javascript'>alert($username);</script>";	
     ?>

    
</body>
</html>
</html>
