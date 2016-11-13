<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Arrays</title>
</head>
<body>
<pre>
	
<?php 


function suche($array, $suchwort){

	foreach ($array as $key => $value){
		if($suchwort == $value){
			return $key;
			
		}
	}
	return false;
}
	$arr = array('Anne', 'Bertha', 'Chris', 'Domi'); 
		var_dump(suche($arr, "Chris"));

 ?>
</pre>
</body>
</html>