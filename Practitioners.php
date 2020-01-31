<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
        <link rel="stylesheet" type="text/css" href="Practitioners.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Falls Prevention Association </title>

</head>
<body>
	<?php  
		session_start();
		if (!isset($_SESSION['CheckLogin']))
			header("Location: Main.php");
    ?>
    <div>

        <!-- Add subject button in same line as heading  -->
		<br>
		<a id="r" style = "margin-right: 48px" class="button3" href="Logout.php">  Logout</a>
		<br>
        <H1> 
            Practitioners 
        </H1>
		<br>
		<a style = "margin-left: 48px" id="b" class="button2" href="AdminPage.php">  Back</a>
        <a style = "margin-right: 47px" id="r" class="button" href="AddPractitioner.php">  Add Practitioner </a>
        <br><br><br><br><br>
        <TABLE style="width:94%; overflow: scroll; margin-left:auto; margin-right:auto;"  border="3" 
		cellspacing="2" cellpadding="5" align="centre">

        <TR>
        <!-- start of header row definition -->
            <TH> Practitioner ID </TH>
            <TH> Name (Last, First) </TH>
			<TH> Trial/s </TH>
            <TH> </TH>
        </TR>
        <!-- end header row definition -->

        <?php
         	$conn2 = odbc_connect('z5118839', '', '', SQL_CUR_USE_ODBC);
            if(!$conn2){
                echo "<script type='text/javascript'>alert('not connected');</script>";
            } 
            $sqlQuery = "SELECT * FROM Practitioner";
            $sqlQuery2 = "SELECT * FROM FallsRiskData_Sessions WHERE (Trial ='Parkinsons_Trial')";

            $registered = odbc_exec($conn2, $sqlQuery);
            $parkinsons = odbc_exec($conn2, $sqlQuery2);
			
                        //Print Parkinsons Trial subjects
                while(odbc_fetch_row($registered)){ 
					if 	(odbc_result($registered,"Admin") == false) { 
                        ?>	<TR>
							<TH > 
								<?php 
									$ID = odbc_result($registered,"Practitioner_ID"); 
									echo ($ID);
								?>  
							</TH>
							
                            <TD> 
								<?php 
									echo (odbc_result($registered,"LastName"));
									echo ", ";
									echo (odbc_result($registered,"FirstName"));
  
								?>
							</TD>
							
                            <TD>
								<?php 
									if (odbc_result($registered,"ParkinsonsTrial") == true) {
										echo "Parkinsons Trial<br>";
										$p = 1;
									} else {
										$p = 0;
									}
									if (odbc_result($registered,"MultipleFallersTrial") == true) {
										echo "Multiple Fallers Trial<br>";
										$m = 1;
									} else {
										$m = 0;
									}
									if (odbc_result($registered,"POWHospitalTrial") == true) {
										echo "POW Hospital Trial<br>";
										$pow = 1;
									} else {
										$pow = 0;
									}
								?> 
							</TD>
								
                            <TD> 
								<a href="EditPractitioner.php?id=<?php echo $ID?>&p=<?php echo $p?>&m=<?php echo $m?>&pow=<?php echo $pow?>">Edit Practitioner Details</a> 
							</TD>

							</TR> 
					<?php 
					}
				}
				?> 						
					


        </TABLE>
		<br><br>
    </div>
</body>
</html>