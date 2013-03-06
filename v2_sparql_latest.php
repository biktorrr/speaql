<?php
	
	$myquery1 = "SELECT DISTINCT ?id
	WHERE { 
	?c <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://purl.org/collections/w4ra/radiomarche/Communique> . 
	?c <http://purl.org/collections/w4ra/radiomarche/con_com_id> ?id .
	} ORDER BY ASC(?id) LIMIT 1";
		
	
	$encoded_query = urlencode($myquery1);
	$myurl = 'http://eculture.cs.vu.nl:1979/sparql/?query=' .$encoded_query;
	$result1 = file_get_contents($myurl);
	$xmlresult = simplexml_load_string($result1);
	
	$latestid = $xmlresult->results->result->binding->literal;





	print "\n<vxml version = \"2.1\" > \n<form id=\"result\">\n <block> \n<prompt>\n";
	print "This menu is not yet fully implemented. However, the latest communique number is " .$latestid ;	
	print "<break time=\"0.5s\"/>\n";
#
	print "You will now return to the main menu. <break time=\"0.5s\"/>\n </prompt><goto next=\"mytest.xml\"/>\n</block></form></vxml>";

?>