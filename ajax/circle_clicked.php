<?php
	session_start();
		
	require_once("../library/svgajaxadapter.class.php");	
		
	$_SESSION["points"] += ceil($_SESSION["level"]/10); 
	
	
?>