<?php

	$city = $_['city'];
	
	$weather = file_get_contents('http://tango57.com/weatherapi.php?city=' . $city);

?>

<vxml version = "2.1" >

 <form id="result">
  <block>
   <prompt>The weather for <?php print $city; ?> is <?php print $weather; ?> </prompt>
  </block>
 </form>

 
 
 </vxml>