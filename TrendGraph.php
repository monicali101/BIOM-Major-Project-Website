<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
        <link rel="stylesheet" type="text/css" href="SubjectData.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Falls Prevention Association </title>

</head>
<body>
	<div>
	<br><br>
	
    <?php
		session_start();
		if (!isset($_SESSION['CheckLogin']))
			header("Location: Main.php");
		
		echo "<H1 style=\"font-size: 30pt; margin-bottom: -100px; margin-left: 35px; \"> <a id=\"r\" class=\"button\" href=\"SubjectsAdmin.php\">  Back</a>True Falls Risk vs. Age";
		
    	$conn3 = odbc_connect('z5118839', '', '', SQL_CUR_USE_ODBC);
        if(!$conn3){
        	echo "<script type='text/javascript'>alert('not connected');</script>";
        } 
        $sqlQuery = "SELECT * FROM FallsRiskData_Sessions ";
		$scan = odbc_exec($conn3,$sqlQuery);

		$YValues = array();
		$XValues = array();

		//This is the relative path to the TeeChart directory
	    require_once("TeeChartNew/sources/libTeeChart.php"); 
	
		//Set up chart		
		$chart1 = new TChart(1080,720);
		$chart1->getAspect()->setView3D(false);
		$chart1->getHeader()->setText(" ");
		//Legend
		$chart1->getLegend()->setVisible(false);

		//Axes
		$chart1->getAxes()->getLeft()->getLabels()->setCustomSize(30);
		$chart1->getAxes()->getBottom()->getLabels()->setCustomSize(30);
		$chart1->getAxes()->getLeft()->getLabels()->setValueFormat("0.000");
		$chart1->getAxes()->getLeft()->setMinMax(-1.5,2.5);
		
		$varname = new Points($chart1->getChart());

		$i = 0; $j = 0;
		$list = array();
		$duplicate = false;
		$todayy = date('Y');
		$todaym = date('m');

		while(odbc_fetch_row($scan)){
			$ID = (odbc_result($scan,"Subject_ID"));
			//Get list of everyone
			while ($j < $i) {
				if ($list[$j] == $ID) {
					$duplicate = true;
					break;
				}
			$j++;
			} 
			$j = 0;
			// Add to list
			if ($duplicate == false) {
				
				$bday = (odbc_result($scan,"SubjectBirthDate"));
				$dobR = explode("-", $bday);
				$DoBm = $dobR[1];
				$DoBy = $dobR[0];
				if ($DoBy < $todayy) {
					$list[$i] = $ID;
					if ($DoBm <= $todaym) {
						$age = $todayy-$DoBy;
					} else {
						$age = $todayy-($DoBy-1);
					}
					$XValues[$i] = $age;
					$i++;	
				}
			} else {
				$duplicate = false;
			}
		}

		$j = 0;
		while ($j < $i) {
			$avg = 0;
			$count = 0;
			$sqlQuery0 = "SELECT * FROM FallsRiskData_Sessions WHERE (Subject_ID = $list[$j])";
			$average = odbc_exec($conn3,$sqlQuery0);
			while(odbc_fetch_row($average)) {
				$count++;
				$tfr = (odbc_result($average,"TrueFallsRisk"));
				$avg = $avg + $tfr;
			}
			$avg = $avg/$count;
			$YValues[$j] = $avg;
			$j++;
		}

		$i=0;
		foreach($YValues as $x){
			//echo $XValues[$i] . " " . $YValues[$i] . "<br>";
			$varname->addXY($XValues[$i],$YValues[$i]);
			$i++;
		}
		

	    $varname->Setcolor(Color::BLUE()); 

		$chart1->getAxes()->getBottom()->getTitle()->setText("Age (years)"); 
		$chart1->getAxes()->getLeft()->getTitle()->setText("True Falls Risk (higher is better)"); 

		$chart1->render("ecg.png");	 			
	
		
	?>
		
    	<img src="ecg.png" style=" margin-top: -100px; display: block; "/>
			<br><br><br><br><br>
		
    </div>

</body>
</html>
