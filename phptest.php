
<?php

$productname = "Beurre de karite";

$query ="SELECT DISTINCT ?pn WHERE { ?o <http://purl.org/collections/w4ra/radiomarche/has_contact> ?p.  ?o <http://purl.org/collections/w4ra/radiomarche/prod_name> ?prod.?prod <http://www.w3.org/2000/01/rdf-schema#label> \"". $productname ."\".?p <http://purl.org/collections/w4ra/radiomarche/contact_lname> ?pn.}";

$format = "format=json";



$baseURL =  "http://eculture.cs.vu.nl:1979/sparql/?query=";
$sparqlURL = $baseURL . urlencode($query.$format) ;

print "\n".$sparqlURL."\n";
$data = file_get_contents($sparqlURL);

print "Retrieved data:\n" ;
$obj = json_decode($data);
	
?>

http://eculture.cs.vu.nl:1979/sparql/?query=SELECT+DISTINCT+%3Fpn+WHERE+%7B+%3Fo+%3Chttp%3A%2F%2Fpurl.org%2Fcollections%2Fw4ra%2Fradiomarche%2Fhas_contact%3E+%3Fp.++%3Fo+%3Chttp%3A%2F%2Fpurl.org%2Fcollections%2Fw4ra%2Fradiomarche%2Fprod_name%3E+%3Fprod.%3Fprod+%3Chttp%3A%2F%2Fwww.w3.org%2F2000%2F01%2Frdf-schema%23label%3E+%22%20Beurre+de+karite%22.%3Fp+%3Chttp%3A%2F%2Fpurl.org%2Fcollections%2Fw4ra%2Fradiomarche%2Fcontact_lname%3E+%3Fpn.%7Dformat%3Djson