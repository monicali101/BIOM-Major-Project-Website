<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
        <link rel="stylesheet" type="text/css" href="SubjectAdmin.css">
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
            Trial Subjects 
        </H1>
		<br>
		<a id="b" style = "margin-left: 48px" class="button2" href="AdminPage.php">  Back</a>
        <a id="r" style = "margin-right: 48px" class="button4" href="TrendGraph.php">  View Trend Graph for True Falls Risk</a>
        <br><br><br><br><br>
        <TABLE style="width:94%; overflow: scroll; margin-left:auto; margin-right:auto;"  border="3" 
		cellspacing="2" cellpadding="5" align="centre">

        <TR>
        <!-- start of header row definition -->
            <TH> Trial </TH>
            <TH> Subject ID </TH>
            <TH> Name (Last, First) </TH>
			<TH> Assigned Practitioner (Last, First)</TH>
            <TH> </TH>
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
			$sqlQuery3 = "SELECT * FROM FallsRiskData_Sessions WHERE (Trial ='Multiple_Fallers_Trial')";
			$sqlQuery4 = "SELECT * FROM FallsRiskData_Sessions WHERE (Trial ='POW_Hospital_Trial')";
			$sqlQuery5 = "SELECT * FROM Subject";
            $registered = odbc_exec($conn2, $sqlQuery);
            $parkinsons = odbc_exec($conn2, $sqlQuery2);
			$multiple = odbc_exec($conn2, $sqlQuery3);
			$pow = odbc_exec($conn2, $sqlQuery4);
			$pList = array();
			$mList = array();
			$powList = array();
			$i = 0; $j = 0; $duplicate = false;

                        //Print Parkinsons Trial subjects
                        while(odbc_fetch_row($parkinsons)){ 
						// Check for duplicates
							$ID = (odbc_result($parkinsons,"Subject_ID"));
							while ($j < $i) {
								if ($pList[$j] == $ID) {
									$duplicate = true;
									break;
								}
								$j++;
							} 
							$j = 0;
							// Write to row
							if ($duplicate == false) {
								$pList[$i] = $ID;
								$i++;
							
							
                        ?>	<TR>
							<TH > Parkinsons Trial </TH>
							
                            <TD>
								<?php echo $ID?> 
							</TD>
							
                            <TD> 
								<?php 
									$name = odbc_exec($conn2, $sqlQuery5);
									while(odbc_fetch_row($name)) {
										if (odbc_result($name,"Subject_ID") === $ID) {
											echo (odbc_result($name,"LastName"));
											echo ", ";
											echo (odbc_result($name,"FirstName"));
										}
									}	  
								?>
							</TD>
							
                            <TD>
								<?php 
									$pracID = odbc_result($parkinsons,"Practitioner_ID"); 
									$lol = odbc_exec($conn2, $sqlQuery);
									$counter = 0;
									while(odbc_fetch_row($lol)) {
										if (odbc_result($lol,"Practitioner_ID") == $pracID) {
											$counter++;
											echo (odbc_result($lol,"LastName"));
											echo ", ";
											echo (odbc_result($lol,"FirstName"));
										}
									}	
									if ($counter == 0) {
										echo"-";
									}
								?> 
							</TD>
							
							
                            <TD> 
								<a href="SubjectDataAdmin.php?id=<?php echo $ID?>">View Data</a> 
							</TD>
							<TD> 
								<a href="AssignSubject.php?id=<?php echo $ID?>">Assign Subject to Practitioner</a> 
							</TD>
							</TR> 
							<?php
							} else {
								$duplicate = false;
							}
							?>	
						<?php 
						} 						
					
						//Print Multiple Fallers Trial subjects
						$j = 0; $i = 0; $duplicate = false;
						while(odbc_fetch_row($multiple)){ 
						// Check for duplicates
							$ID = (odbc_result($multiple,"Subject_ID"));
							while ($j < $i) {
								if ($mList[$j] == $ID) {
									$duplicate = true;
									break;
								}
								$j++;
							} 
							$j = 0;
							// Write to row
							if ($duplicate == false) {
								$mList[$i] = $ID;
								$i++;
							
							
						?>	<TR>
							<TH > Multiple Fallers Trial </TH>
                            <TD>
								<?php echo $ID; ?> 
							</TD>
					
                            <TD> 
								<?php 
									$name = odbc_exec($conn2, $sqlQuery5);	
									while(odbc_fetch_row($name)) {
										if (odbc_result($name,"Subject_ID") == $ID) {
											$counter++;
											echo (odbc_result($name,"LastName"));
											echo ", ";
											echo (odbc_result($name,"FirstName"));
										}
									}								
								?>
							</TD>
							
                            <TD>
								<?php 
									$pracID = odbc_result($multiple,"Practitioner_ID"); 
									$counter = 0;
									$lol = odbc_exec($conn2, $sqlQuery);
									while(odbc_fetch_row($lol)) {
										if (odbc_result($lol,"Practitioner_ID") == $pracID) {
											$counter++;
											echo (odbc_result($lol,"LastName"));
											echo ", ";
											echo (odbc_result($lol,"FirstName"));
										}
									}	
									if ($counter == 0) {
										echo"-";
									}	
								?> 
							</TD>
							
							<TD> 
								<a href="SubjectDataAdmin.php?id=<?php echo $ID?>">View Data</a> 
							</TD>
							<TD> 
								<a href="AssignSubject.php?id=<?php echo $ID?>">Assign Subject to Practitioner</a> 
							</TD>
							</TR> 
							<?php
							} else {
								$duplicate = false;
							}
							?>	
						<?php
						}
						//Print POW Trial subjects
						$j = 0; $i = 0; $duplicate = false;
						while(odbc_fetch_row($pow)){ 
						// Check for duplicates
							$ID = (odbc_result($pow,"Subject_ID"));
							while ($j < $i) {
								if ($powList[$j] == $ID) {
									$duplicate = true;
									break;
								}
								$j++;
							} 
							$j = 0;
							// Write to row
						if ($duplicate == false) {
							$powList[$i] = $ID;
							$i++;
		
						?>	<TR>
							<TH > POW Hospital Trial </TH>
                            <TD>
								<?php echo $ID; ?> 
							</TD>
					
                            <TD> 
								<?php 
									$name = odbc_exec($conn2, $sqlQuery5);
									while(odbc_fetch_row($name)) {
										if (odbc_result($name,"Subject_ID") === $ID) {
											echo (odbc_result($name,"LastName"));
											echo ", ";
											echo (odbc_result($name,"FirstName"));
										}
									}	  
								?>
							</TD>
							<TD>
								<?php 
									$pracID = odbc_result($pow,"Practitioner_ID"); 
									$counter = 0;
									$lol = odbc_exec($conn2, $sqlQuery);
									while(odbc_fetch_row($lol)) {
										if (odbc_result($lol,"Practitioner_ID") == $pracID) {
											$counter++;
											echo (odbc_result($lol,"LastName"));
											echo ", ";
											echo (odbc_result($lol,"FirstName"));
										}
									}	
									if ($counter == 0) {
										echo"-";
									}		
								?> 
							</TD>
							<TD> 
								<a href="SubjectDataAdmin.php?id=<?php echo $ID?>">View Data</a> 
							</TD>
							<TD> 
								<a href="AssignSubject.php?id=<?php echo $ID?>">Assign Subject to Practitioner</a> 
							</TD>
							</TR> 
							<?php
							} else {
								$duplicate = false;
							}
							?>	
						<?php
						}?>

        </TABLE>
		<br><br>
    </div>
</body>
</html>