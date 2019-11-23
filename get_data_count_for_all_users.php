<?php
	session_start();
	

// get the q,r,s,t parameter from URL
//$q = $_REQUEST["q"];

$database=mysqli_connect("localhost","root","","pr");
	if(!$database)
	{
		echo mysqli_error();
		echo "CONNECTION ERROR";
	}



if (true){
    
	$query  = "SELECT sum(key_strokes),sum(matched_strokes),sum(accuracy),sum(word_count),sum(timer),sum(ranking) from user_data ";
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