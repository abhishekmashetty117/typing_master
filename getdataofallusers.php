<?php
	session_start();
	

// get the q,r,s,t parameter from URL
$q = $_REQUEST["q"];

$database=mysqli_connect("localhost","root","","typinghands");
	if(!$database)
	{
		echo mysqli_error();
		echo "CONNECTION ERROR";
	}



if ($q != ""){
    
	$query  = "SELECT key_strokes,matched_strokes,accuracy,word_count,timer from user_data ";
	$resultset = array();
	$y = mysqli_query($database,$query);
	while($x = mysqli_fetch_assoc($y)){
		$resultset[]= array_values($x);
	}
	echo json_encode($resultset);
	
}

// Output "no suggestion" if no hint was found or output correct values 
//echo $hint;
?>