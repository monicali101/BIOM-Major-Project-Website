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
		<?php
		session_start();
		if (!isset($_SESSION['CheckLogin']))
			header("Location: Main.php");
		?>
		
		<!-- To maintain background -->
        <img src="images/logo.png" style="width:12%;">

        <div>
            <br><br><br><br><br><br><br><br>            
        
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

	    </div>
        
        <?php
		if (check() == 2) {
			session_start();
			$_SESSION['CheckLogin'] = $_POST["username"];
			header('Location:Subjects.php');
		} else if (check() == 1) {
			$_SESSION['CheckLogin'] = 1;
			header('Location:AdminPage.php');
		} else {
			session_start();
			$_SESSION['Failed'] = true;
			header('Location:Main.php');
			
		}

		function check (){
         	$conn = odbc_connect('z5118839', '', '', SQL_CUR_USE_ODBC);
            if(!$conn){
                echo "<script type='text/javascript'>alert('ODBC not connected');</script>";
			}
			$username = $_POST["username"];
			$password = $_POST["password"];
			$sqlQuery = "SELECT * FROM Practitioner";
			$registered = odbc_exec($conn, $sqlQuery);
			while(odbc_fetch_row($registered)) { 
				// If username matches
				if (odbc_result($registered,"Username") === $username) {
					// If password matches
					if (odbc_result($registered,"Password") === $password) {
						if (odbc_result($registered,"Admin") == true) {
							//go to AdminPage.php
							odbc_close($conn);
							return 1;
						} else {
							//go to Subjects.php
							odbc_close($conn);
							return 2;	
						}
					}
					// Password wrong
					break;
				}
			}
			// go to main.php
			odbc_close($conn);
			return 0;
		}
     	?>
    
</body>
</html>
</html>
