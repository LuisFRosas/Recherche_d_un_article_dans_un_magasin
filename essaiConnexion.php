<?php
	include_once("./includes/dbconnect.inc.php");
	
	//Connexion au serveur
	$id = new mysqli(HOST,USER,PASS,"????");
	
	if(!$id){
		echo "<script type=text/javascript>"
				." alert('Connexion Imposible à la base')"
				."</script>";
	}
	else{
		echo "<pre>".print_r($id,true)."</pre>";
		
	}

?>