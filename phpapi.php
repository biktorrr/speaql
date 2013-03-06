<?php

	$city = $_GET['city'];
	
	switch($city){
		case "amsterdam" : print "rainy"; break;
		case "london" : print "again rainy"; break;
		case "madrid" : print "sunny"; break;
		default : print "no idea"; break;
		}	
	
?>