<?php
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
   		$myip = $_SERVER['HTTP_CLIENT_IP'];
	}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   		$myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
   		$myip= $_SERVER['REMOTE_ADDR'];
	}
	echo "your ip address is "."$myip"."<br>"."<br>";

	if($myip=="127.0.0.1"){ 
		echo "you hacked it!"."<br>";
		// system("cat flag");
		$path = "flag";
		$fileContent = file_get_contents($path);
		echo $fileContent;
	}else{
		echo "sorry , Im only welcome 127.0.0.1";
	}
	
?>

