<?php 
	session_start();
	error_reporting(0);
?>
<html>
<body>
<script>
// callback function to display greeting
function showGreeting() {
	var xmlht = new XMLHttpRequest();
	var q_value = 113762530674;
			xmlht.onreadystatechange = function() {
					if (xmlht.readyState == 4 && xmlht.status == 200) {
						var res  = JSON.parse(xmlht.responseText);
						//alert(words_from_file);
						var ip = "<?php echo $_SESSION['ip'];?>";
						var ip_type = "<?php echo $_SESSION['ip_type'];?>";
						var conti_name = "<?php echo $_SESSION['conti_name'];?>";
						var city = "<?php echo $_SESSION['city'];?>";
						var zip = "<?php echo $_SESSION['zip'];?>";
						var latt = "<?php echo $_SESSION['latt'];?>";
						var longi = "<?php echo $_SESSION['long'];?>";						
						var locat_lang_name = "<?php echo $_SESSION['locat_lang_name'];?>";					
						var txt = "<br>";
						txt += "<table class='w3-table w3-bordered w3-hoverable w3-animate-left'>";
							txt += "<tr id='ip_waiting_from_php_api_row' >"+
								"<button class='w3-button w3-block w3-red w3-margin-bottom' onclick='calling_index()' id='ip_waiting_from_php_api' colspan=2>For Details Click Here</button>"+
									"</tr>"+
									"<tr>"+
								"<td>IP</td>"+
								"<td>"+ip+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>Ip Type</td>"+
								"<td>"+ip_type+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>Continent</td>"+
								"<td>"+conti_name+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>City</td>"+
								"<td>"+city+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>Zipcode</td>"+
								"<td>"+zip+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>Latitude</td>"+
								"<td>"+latt+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>Longitude</td>"+
								"<td>"+longi+"</td>"+
									"</tr>"+
									"<tr>"+
								"<td>Language</td>"+
								"<td>"+locat_lang_name+"</td>"+
									"</tr>"+
									"</table>"
								
								document.getElementById("users_ip_details_with_many_other_things").innerHTML = txt;
								//document.getElementById("demo").innerHTML = txt;
								if(ip){
									document.getElementById("ip_waiting_from_php_api_row").style.display = "none";
									document.getElementById("ip_waiting_from_php_api").style.display = "none";
									
								}else{
									document.getElementById("ip_waiting_from_php_api_row").style.display = "block";
									document.getElementById("ip_waiting_from_php_api").style.display = "block";
								}															
						}
					};
					
			xmlht.open("GET", "php_api.php?q="+q_value, true);
			xmlht.send();
}
showGreeting();
function calling_index(){
	location.reload();
}

</script>
	<p id="demo"></p>
</body>
</html>
