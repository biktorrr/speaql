<?php
	$region  = $_GET["region"];
	
	$myquery1 = "SELECT DISTINCT ?vname
	WHERE { 
	?z <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://purl.org/collections/w4ra/radiomarche/Zone> . 
	?z <http://www.w3.org/2000/01/rdf-schema#label> '" .$region ."'.
	?v <http://purl.org/collections/w4ra/radiomarche/in_zone> ?z .
	?v <http://www.w3.org/2000/01/rdf-schema#label> ?vname .
	}";
		

	
	$encoded_query = urlencode($myquery1);
	$myurl = 'http://eculture.cs.vu.nl:1979/sparql/?query=' .$encoded_query;
	print "<!--".$myurl."-->";
	$result1 = file_get_contents($myurl);
	$xmlresult = simplexml_load_string($result1);

	print "\n<vxml version = \"2.1\" > \n<form id=\"result\">\n <block> \n<prompt>\n";
	print "The following is a list of all villages in the  ".$region ." region in which currently produce is offered \n" ;	
	print "<break time=\"0.5s\"/>\n";


 	foreach($xmlresult->results->result as $result){

	print $result->binding->literal;
	print "<break time=\"0.5s\"/>\n";
	 }

	print "You will now return to the main menu. <break time=\"0.5s\"/>\n </prompt><goto next=\"mytest.xml\"/>\n</block></form></vxml>";

?>