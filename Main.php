<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
        <link rel="stylesheet" type="text/css" href="Main.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Falls Prevention Association </title>

</head>
<body>        
        <!-- Image designed by me i.e. not downloaded-->
        <img src="images/logo.png" style="width:12%;">
		
        <div>
            <br><br><br><br><br><br><br><br><br>               
        
        <form id="loginInfo" onSubmit = "return submit()" method="POST" action="CheckLogin.php" target = "_self"> 
            <!-- Username -->   
            <input type = "text" id = "username" name = "username" value = "" maxlength = "35" size = "36"
            placeholder = "&nbsp Username" onChange = "adminCheck()" required>
        
            <!-- Password -->
            <input type = "password" id = "password" name = "password" value = "" maxlength = "35" size = "36"
            placeholder = "&nbsp Password" required>
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
            var username = document.getElementById('username').value;
            if (username == "yo") {
                 document.getElementById('admin').setAttribute("style", "display: block;");      
            } else {
                document.getElementById('admin').setAttribute("style", "display: none;"); 
            }
           
        }
        function submit() {
			return true;
        }
    </script>
    
    <?PHP
		session_start();
		
		if(isset($_SESSION['Failed']) && $_SESSION['Failed']) {
		  /* from Page2.php logic here */
			echo "<script type='text/javascript'>alert('Access Denied');</script>";
			unset($_SESSION['Failed']);
		} else {
		}
	?>

    
</body>
</html>