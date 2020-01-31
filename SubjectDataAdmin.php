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
		
		$UID = $_GET["id"];
		//echo "<a id=\"r\" class=\"button\" href=\"Subjects.php\">  Back</a>";
		echo "<H1 style=\"font-size: 30pt; margin-bottom: -100px; margin-left: 35px;\"> <a id=\"r\" class=\"button\" href=\"SubjectsAdmin.php\">  Back</a>Subject ";
		echo $UID;
		echo "'s Triax Data &nbsp&nbsp&nbsp&nbsp</H1>";
    	
    	$conn3 = odbc_connect('z5118839', '', '', SQL_CUR_USE_ODBC);
        if(!$conn3){
        	echo "<script type='text/javascript'>alert('not connected');</script>";
        } 
        $sqlQuery = "SELECT * FROM Triax_Data WHERE (Subject_ID =$UID)";
		$registered = odbc_exec($conn3,$sqlQuery);
		
		$TriaxML = odbc_result($registered,"TriaxML");
		$ML = explode(" ", $TriaxML);
		$TriaxAP = odbc_result($registered,"TriaxAP");
		$AP = explode(" ", $TriaxAP);
		$TriaxVT = odbc_result($registered,"TriaxVT");
		$VT = explode(" ", $TriaxVT);
		
		$markers = odbc_result($registered,"Markers");
		$M = explode(" ", $markers);
		$YValues = array();
		$YValues2 = array();
		$YValues3 = array();
		$YValues4 = array();
		$XValues = array();
		$XValues2 = array();
		$XValues3 = array();
		$XValues4 = array();

		//This is the relative path to the TeeChart directory
	    require_once("TeeChartNew/sources/libTeeChart.php"); 
	
		//Set up chart		
		$chart1 = new TChart(1080,720);
		$chart1->getAspect()->setView3D(false);
		$chart1->getHeader()->setText(" ");
		//Legend
		$chart1->getLegend()->setVisible(true);
		$chart1->getLegend()->setLegendStyle(LegendStyle::$SERIES);
		$chart1->getLegend()->getFont()->setColor(Color::BLACK());
		$chart1->getLegend()->getFont()->setSize(11);
		
		//Axes
		$chart1->getAxes()->getLeft()->getLabels()->setCustomSize(20);
		$chart1->getAxes()->getBottom()->getLabels()->setCustomSize(20);
		$chart1->getAxes()->getLeft()->getLabels()->setValueFormat("0.000");
		$chart1->getAxes()->getLeft()->setMinMax(-1.5,1.5);
		
		$varname = new Line($chart1->getChart());
		$varname->title="TriaxML";
		$varname2 = new Line($chart1->getChart());
		$varname2->title="TriaxAP";
		$varname3 = new Line($chart1->getChart());
		$varname3->title="TriaxVT";
		$varname4 = new points($chart1->getChart());
		$varname4->title="Markers";

		//Number of data points
		$num = count ($ML);
		$num1 = count ($AP);
		$num2 = count ($VT);
		$num3 = count ($M);
		
		for($i = 0; $i < ($num-1); $i++) {
			$XValues[$i] = ($i/40)*1000;
			$YValues[$i] = round(((3*$ML[$i])/4095)-1.5,3);
	
		}
		
		for($i = 0; $i < ($num1-1); $i++) {
			$XValues2[$i] = ($i/40)*1000;
			$YValues2[$i] = round(((3*$AP[$i])/4095)-1.5,3); 	
		}
		
		for($i = 0; $i < ($num2-1); $i++) {
			$XValues3[$i] = ($i/40)*1000;
			$YValues3[$i] = round(((3*$VT[$i])/4095)-1.5,3);
		}
		
		for($i = 0; $i < ($num3-1); $i++) {
			$XValues4[$i] = ($M[$i]/40)*1000;
			$YValues4[$i] = 0;
		}		

		
		
		$i=0;
		foreach($YValues as $x){
			$varname->addXY($XValues[$i],$YValues[$i]);
			$i++;
		}
		$i=0;
		foreach($YValues2 as $x){
			$varname2->addXY($XValues2[$i],$YValues2[$i]);
			$i++;
		}
		$i=0;
		foreach($YValues3 as $x){
			$varname3->addXY($XValues3[$i],$YValues3[$i]);
			$i++;
		}
		$i=0;
		foreach($YValues4 as $x){
			$varname4->addXY($XValues4[$i],$YValues4[$i]);
			$i++;
		}

	    $varname->Setcolor(Color::BLUE()); 
		$varname2->Setcolor(Color::RED()); 
		$varname3->Setcolor(Color::GREEN()); 
		$varname4->Setcolor(Color::YELLOW());
		$chart1->getAxes()->getBottom()->getTitle()->setText("Time (ms)"); 
		$chart1->getAxes()->getLeft()->getTitle()->setText("Triax Data (G ms/s/s)"); 

		$chart1->render("ecg.png");				
	
		
	?>
		
    	<img src="ecg.png" style="display: block; "/>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>   
		
    </div>

</body>
</html>
