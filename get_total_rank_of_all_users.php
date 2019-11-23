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
    
	//$query  = "SELECT user_data_id,ranking from user_data ";
	$query = "select user_data_id,max(word_count) from user_data group by user_data_id ORDER BY max(word_count) DESC ";
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