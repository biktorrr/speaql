<?php

	$product = $_GET["product"];
	print "<!--".$product."-->";

	
	$myquery1 = "SELECT DISTINCT ?pname 
WHERE { 
?p <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://purl.org/collections/w4ra/radiomarche/Person> . 
?o <http://purl.org/collections/w4ra/radiomarche/has_contact> ?p . 
?o <http://purl.org/collections/w4ra/radiomarche/prod_name> ?pn . 
?pn <http://www.w3.org/2000/01/rdf-schema#label> '" .$product ."'.
?p <http://purl.org/collections/w4ra/radiomarche/contact_lname> ?pname}";
	
	$myquery1 = "SELECT DISTINCT ?fname ?pname ?quant ?meas ?price
	WHERE { 
	?p <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://purl.org/collections/w4ra/radiomarche/Person> . 
	?o <http://purl.org/collections/w4ra/radiomarche/has_contact> ?p . 
	?o <http://purl.org/collections/w4ra/radiomarche/prod_name> ?pn . 
	?pn <http://www.w3.org/2000/01/rdf-schema#label> '" .$product ."'.
	?p <http://purl.org/collections/w4ra/radiomarche/contact_lname> ?pname .
	?p <http://purl.org/collections/w4ra/radiomarche/contact_fname> ?fname .
	?o <http://purl.org/collections/w4ra/radiomarche/quantity> ?quant . 
	?o <http://purl.org/collections/w4ra/radiomarche/unit_measure> ?meas . 
	?o <http://purl.org/collections/w4ra/radiomarche/price> ?price . 
	}";
		

	
	$encoded_query = urlencode($myquery1);
	#print $encoded_query;
#	$myurl = 'http://eculture.cs.vu.nl:1979/sparql/?query=' .$encoded_query;
        $myurl = 'http://semanticweb.cs.vu.nl/radiomarche/sparql/?query=' .$encoded_query;	
print "<!--".$myurl."-->";
	$result1 = file_get_contents($myurl);
	$xmlresult = simplexml_load_string($result1);

	print "\n<vxml version = \"2.1\" > \n<form id=\"result\">\n <block> \n<prompt>\n";
	print "The following is a list of all current offerings for ".$product ."\n" ;	
	print "<break time=\"0.5s\"/>\n";

 	foreach($xmlresult->results->result as $result){
	 $firstname = $result->binding[0]->literal;
	 $pname = $result->binding[1]->literal;
	 $quant = $result->binding[2]->literal;
	 $meas =  $result->binding[3]->literal;	 
	 if ($meas=="kg"){ $meas = "kilos";}
	 $price =  $result->binding[4]->literal;

	print $firstname ." " .$pname ." offers " .$quant ." " .$meas ." for " .$price ." CFA";
	print "<break time=\"0.5s\"/>\n";
	 }


	print "You will now return to the main menu. <break time=\"0.5s\"/>\n </prompt><goto next=\"mytest.xml\"/>\n</block></form></vxml>";

?>
