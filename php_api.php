<?php 
	session_start();
	error_reporting(0);
?>

<?php

$database=mysqli_connect("localhost","root","","typinghands");
	if(!$database)
	{
		echo mysqli_error();
		echo "CONNECTION ERROR";
	}
	
$q = $_REQUEST["q"];


if($q==113762530674 and  isset($_SESSION['Site_User']) and !isset($_SESSION["ip"]) and !isset($_SESSION["ip_type"]) and !isset($_SESSION["conti_code"])  ){
	
	$url = "http://api.ipstack.com/".$_SESSION['User_using_ip']."?access_key=c4d729b5c4f0ef07ac8586be9852dd57";
	$response = file_get_contents($url);
	//$response = file_get_contents('http://api.ipstack.com/134.201.250.155?access_key=c4d729b5c4f0ef07ac8586be9852dd57');
	//$response = json_decode($response);
	
	$x = json_decode($response);
	
	$ip = $x->ip;
	$ip_type = $x->type;
	$conti_code = $x->continent_code;
	$conti_name = $x->continent_name;
	$countr_code = $x->country_code;
	$countr_name = $x->country_name;
	$region_code = $x->region_code;
	$region_name = $x->region_name;
	$city = $x->city;
	$zip = $x->zip;
	$latt = $x->latitude;
	$long = $x->longitude;
	$locat_gen = $x->location->geoname_id;
	$locat_capit = $x->location->capital;
	$locat_lang_code = $x->location->languages[0]->code;
	$locat_lang_name = $x->location->languages[0]->name;
	$locat_lang_native = $x->location->languages[0]->native;
	$locat_countr_flag = $x->location->country_flag;
	$locat_country_flag_emoji = $x->location->country_flag_emoji;
	$locat_country_flag_emoji_unicode = $x->location->country_flag_emoji_unicode;
	$locat_calling_code = $x->location->calling_code;
	$bool_value = $x->location->is_eu ? 'true' : 'false';
	
	$_SESSION["ip"] = $x->ip;
	$_SESSION["ip_type"] = $x->type;
	$_SESSION["conti_code"] = $x->continent_code;
	$_SESSION["conti_name"] = $x->continent_name;
	$_SESSION["countr_code"] = $x->country_code;
	$_SESSION["countr_name"] = $x->country_name;
	$_SESSION["region_code"] = $x->region_code;
	$_SESSION["region_name"] = $x->region_name;
	$_SESSION["city"] = $x->city;
	$_SESSION["zip"] = $x->zip;
	$_SESSION["latt"] = $x->latitude;
	$_SESSION["long"] = $x->longitude;
	$_SESSION["locat_gen"] = $x->location->geoname_id;
	$_SESSION["locat_capit"] = $x->location->capital;
	$_SESSION["locat_lang_code"] = $x->location->languages[0]->code;
	$_SESSION["locat_lang_name"] = $x->location->languages[0]->name;
	$_SESSION["locat_lang_native"] = $x->location->languages[0]->native;
	$_SESSION["locat_countr_flag"] = $x->location->country_flag;
	$_SESSION["locat_country_flag_emoji"] = $x->location->country_flag_emoji;
	$_SESSION["locat_country_flag_emoji_unicode"] = $x->location->country_flag_emoji_unicode;
	$_SESSION["locat_calling_code"] = $x->location->calling_code;
	$_SESSION["bool_value"] = $x->location->is_eu ? 'true' : 'false';
	
	//echo "<br>";
	/*echo $ip,$ip_type,$conti_code,$conti_name,$countr_code,$countr_name,$region_code,$region_name,$city,
	$zip,$latt,$long,$locat_gen,$locat_capit,$locat_lang_code,$locat_lang_name,$locat_lang_native,
	$locat_countr_flag,$locat_country_flag_emoji,$locat_country_flag_emoji_unicode,$locat_calling_code,$bool_value;
	*/
	$query = "
		Insert into ipstack_detail(ip,type_ip,continent_code,continent_name,country_code,country_name,region_code,region_name,city,zip,latitude,
		longitude,location_geoname_id,location_capital,location_languages_code,location_languages_name,location_languages_native,location_country_flag,
		location_country_flag_emoji,location_country_flag_emoji_unicode,location_calling_code,location_is_eu) values(
			'$ip','$ip_type','$conti_code','$conti_name','$countr_code','$countr_name','$region_code','$region_name','$city',
			'$zip','$latt','$long','$locat_gen','$locat_capit','$locat_lang_code','$locat_lang_name','$locat_lang_native',
			'$locat_countr_flag','$locat_country_flag_emoji','$locat_country_flag_emoji_unicode','$locat_calling_code','$bool_value')";
	mysqli_query($database,$query);
	/*
	if(mysqli_query($database,$query)){
		echo "Done";
	}else{
		echo "Not Done";
	}
	*/
	echo $response;
	//$bool_value = $x->location->is_eu ? 'true' : 'false';
	//echo "<br>";
	/*echo $x->ip,$x->type,$x->continent_code,$x->continent_name,$x->country_code,$x->country_name,$x->region_code,$x->region_name,$x->city,$x->zip,
	$x->latitude,$x->longitude,$x->location->geoname_id,$x->location->capital,$x->location->languages[0]->code,$x->location->languages[0]->name,$x->location->languages[0]->native,
	$x->location->country_flag,$x->location->country_flag_emoji,$x->location->country_flag_emoji_unicode,$x->location->calling_code," abhishek ",$bool_value;
	*/
	
}else{
	echo '{"error":"Already_Set"}';
}
	
?>