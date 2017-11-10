<?php 
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';

	session_start();
	
	if(!isset($_SESSION['login_user'])) {
		header("Location: login.php");
		exit;
	}

	$mail = new PHPMailer(true);
	$user_email = $_SESSION['login_user'];
	$full_name = $_SESSION['login_firstname'] . " " . $_SESSION['login_lastname'];
	$subject = "Email notification for successful transaction";
	$body = "
		<html>
			<head>
				<title>Email notification for successful transaction</title>
			</head>
			<body>
				<p>
					Site title: Hoos Cooking<br>
					User: {$full_name}
					Email: {$user_email}
				</p>
			</body>
		</html>
	";

	try {
	    //Server settings
	    $mail->SMTPDebug = 0; // Enable verbose debug output
	    $mail->isSMTP(); // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true; // Enable SMTP authentication
	    $mail->Username = 'hooscookingUVA@gmail.com'; // SMTP username
	    $mail->Password = 'ecomm4753'; // SMTP password
	    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587; // TCP port to connect to

	    //Recipients
	    $mail->setFrom('hooscookingUVA@gmail.com', 'Hoos Cooking');
	    $mail->addAddress($user_email, $full_name); // Add a recipient
	    $mail->addReplyTo('hooscookingUVA@gmail.com', 'Hoos Cooking');

	    //Content
	    $mail->isHTML(true); // Set email format to HTML
	    $mail->Subject = $subject;
	    $mail->Body    = $body;

	    $mail->send();
	} catch (Exception $e) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	}

?>
<!DOCTYPE html>

<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<title>Successful Transaction</title>
		<meta name="description" content="User is redirected to this page upon successfule registration">
		<meta name="author" content="brandt">
	</head>
	<body class="wrap" style="margin-top: 150px;">
		<?php include("header.php"); ?>
		<div align="center">
			<img src="images/yay.jpeg" alt="Successful Registration">
			<h1>Thank you for your purchase!</h1>
			<h2><a href="http://localhost:8080/ecomm-course-project/hooscooking/shop.php">Continue shopping!</a>
			<br><br>
		</div>
	</body>


	<?php include("footer.html"); ?>
</html>