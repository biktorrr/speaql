<?php

	$product = $_GET["product"];
	#$product = "Tamarin";
	print "<!--".$product."-->";

	
	$myquery1 = "SELECT DISTINCT ?pname 
WHERE { 
?p <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://purl.org/collections/w4ra/radiomarche/Person> . 
?o <http://purl.org/collections/w4ra/radiomarche/has_contact> ?p . 
?o <http://purl.org/collections/w4ra/radiomarche/prod_name> ?pn . 
?pn <http://www.w3.org/2000/01/rdf-schema#label> '" .$product ."'.
?p <http://purl.org/collections/w4ra/radiomarche/contact_lname> ?pname}";
	

	
	$encoded_query = urlencode($myquery1);
	#print $encoded_query;
	$myurl = 'http://semanticweb.cs.vu.nl/radiomarche/sparql/?query=' .$encoded_query;
	print "<!--".$myurl."-->";
	$result = file_get_contents($myurl);

	print "<vxml version = \"2.1\" > <form id=\"result\"> <block> <prompt>The names of the persons selling this are:\n" ;
	print "<pre>".$result."</pre>\n";
	print "</prompt></block></form></vxml>";

?>