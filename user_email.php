<?php
	session_start();

// get the q,r,s,t,u parameter from URL
$q = $_REQUEST["q"];


$database=mysqli_connect("localhost","root","","typinghands");
	if(!$database)
	{
		echo mysqli_error();
		echo "CONNECTION ERROR";
	}


$present_time=time();

if ($q !== "" ){
    $insert = "Insert into email_id (mail_id,timer) values('$q','$present_time')";
	mysqli_query($database,$insert);
			// Sending the Confirmation Mail to The User

			
			$email = $q;
			$email2 = "abhishekmashetty107@gmail.com";	
			
			$subject = " TypingWorld";
			$message = "
				<html>
					<head>
						<style type ='text/css'>
							p{
								color:red;
							}
							h4{
								color:gray;
							}
						</style>
					</head>
					<body>
						<h4>Welcome To TypingWorld</h4>
						<p>Will Send You Exciting Challenges through this mail,stay tuned</p>
					</body>
				</html>
			";
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=UTF-8';
			$headers[] = 'From:'. $email2 . "\r\n"; // Sender's Email
			mail($email, $subject, $message,implode("\r\n", $headers));	
	echo '{"Response":"Done"}';
}else{
	echo '{"Response":"Error"}';
}


// Output "no suggestion" if no hint was found or output correct values 
//echo $hint;
?>