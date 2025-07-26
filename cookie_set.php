<?php
	session_start();
?>
<?php
	$r = mysqli_connect("localhost","root","","typinghands");
	if(!$r){
		echo mysqli_error();
		echo "CONNECTION ERROR";
	}
	function get_max_id(){
		$query = "SELECT max(user_id) from user_request ";
		$result_1 = mysqli_query($GLOBALS['r'],$query);
	
		$result = mysqli_fetch_assoc($result_1);
		$max =  $result['max(user_id)'];
		//echo $max ."<br>";
		return $max;
	}
	$request_function = 0;
	function set_cookie_and_user_browser_detail(){
		if($GLOBALS['request_function']==1){
			$value = $_COOKIE["id"];
		}else{
			$value = get_max_id()+1; 
			setcookie("id",$value,time()+(15*365*86400));				
		}
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP')){
			$ipaddress = getenv('HTTP_CLIENT_IP');
			//echo $ipaddress ."line_6 <br>";
		}
		else if(getenv('HTTP_X_FORWARDED_FOR')){
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
			//echo $ipaddress ."line_10 <br>";
		}
		else if(getenv('HTTP_X_FORWARDED')){
			$ipaddress = getenv('HTTP_X_FORWARDED');
			//echo $ipaddress ."line_14 <br>";
		}
		else if(getenv('HTTP_FORWARDED_FOR')){
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
			//echo $ipaddress ."line_18 <br>";
		}
		else if(getenv('HTTP_FORWARDED')){
		   $ipaddress = getenv('HTTP_FORWARDED');
			//echo $ipaddress ."line_22 <br>";
		}
		else if(getenv('REMOTE_ADDR')){
			$ipaddress = getenv('REMOTE_ADDR');
			//echo $ipaddress ."line_26 <br>";
		}
		else
			$ipaddress = 'UNKNOWN';
		
		$_SESSION["User_using_ip"] = $ipaddress;
		$s_p = $_SERVER['SERVER_PROTOCOL'];
		$r_m = $_SERVER['REQUEST_METHOD'];
		$r_t = $_SERVER['REQUEST_TIME'];
		$h_h = $_SERVER['HTTP_HOST'];
		$r_p = $_SERVER['REMOTE_PORT'];
		$s_f = $_SERVER['SCRIPT_FILENAME'];
		$h_a = $_SERVER['HTTP_ACCEPT'];
		
		$insert_id = "INSERT INTO user_request(user_id,ip_address,server_protocol,request_method,request_time,http_host,remote_port,script_filename,http_accept)
		values('$value','$ipaddress','$s_p','$r_m','$r_t','$h_h','$r_p','$s_f','$h_a')";
		mysqli_query($GLOBALS['r'],$insert_id);
	
		return $value;
	}
	
	if(isset($_COOKIE["id"])){
		// This is equivalent to Login
		
		$temp_id = $_COOKIE["id"];
		$validate_id = "SELECT * from user_request where user_id = '$temp_id' ";
		$validate_result = mysqli_query($r,$validate_id);
		if(mysqli_num_rows($validate_result)>=1){
				$GLOBALS['request_function'] = 1;
				$_SESSION['Site_User'] = $_COOKIE["id"];
				$value = set_cookie_and_user_browser_detail();
				$_SESSION['from'] = 'in';
				//header('location:index_typing.php');
		}else{
			//echo "Do Not modify cookie value";
		}
	}else{
		// This is equivalent to Registration
		$GLOBALS['request_function'] = 2;
		$value = set_cookie_and_user_browser_detail();
		$_SESSION['Site_User'] = $value;
		$_SESSION['from'] = 'else';
		//header('location:index_typing.php');
	}
?>