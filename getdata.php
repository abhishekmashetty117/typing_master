<?php
	session_start();
	$_SESSION['Inserted_users_stats'] = 1;

// get the q,r,s,t,u parameter from URL
$q = $_REQUEST["q"];
$r = $_REQUEST["r"];
$s = $_REQUEST["s"];
$t = $_REQUEST["t"];
$u = $_REQUEST["u"];

$database=mysqli_connect("localhost","root","","typinghands");
	if(!$database)
	{
		echo mysqli_error();
		echo "CONNECTION ERROR";
	}


$user = $_SESSION['Site_User'];
$hint = "okay";
$cou = 0;
$present_time=time();

if ($q !== "" and $r !== "" and $s !== "" and $t !== "" and  $u !== ""){
    $insert = "Insert into user_data(user_data_id,key_strokes,matched_strokes,accuracy,word_count,timer,ranking) values('$user','$q','$r','$s','$t','$u','$present_time')";
	mysqli_query($database,$insert);
	$query  = "SELECT key_strokes,matched_strokes,accuracy,word_count,timer from user_data where user_data_id='$user'";
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