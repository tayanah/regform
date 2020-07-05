<?php 
session_start();
$conn  = new PDO("mysql:host=localhost;dbname=regform", 'root', '');
if (!$conn) {
	echo "failed to connect to the dabatase";
}

function cleaner($data){
	return  htmlentities(stripslashes(stripcslashes(htmlspecialchars($data))));
}

if (isset($_POST['login'])) {
	$email = cleaner($_POST['email']);
	$pass = cleaner($_POST['password']);
	if (!empty($email) && !empty($pass)) {
		$login = $conn->prepare("SELECT * FROM `users` WHERE `email` = ? LIMIT 1");
		$login->execute(array($email)); //getch the user record from the db
		$row = $login->fetch(PDO::FETCH_ASSOC);
		if ($login->rowCount() > 0) {
			if (password_verify($pass, $row['password'])) {
				$_SESSION['user'] = $row['userId'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['email'] = $row['email'];
				header('location: home.php');
			}else{
				$_SESSION['errors'] = 'Incorrect Password';
				header('location: login.php');
			}
		}else{
			$_SESSION['errors'] = "User not found, click <a href='./'>Here</a> To register";
			header('location: login.php');
		}
	}else{
		$_SESSION['errors'] = 'Please fill in all the details';
		header('location: login.php');
	}

}

if (isset($_POST['signup'])) {
	$name = cleaner($_POST['name']);
	$email = cleaner($_POST['email']);
	$pass = cleaner($_POST['password']);
	$verpass = cleaner($_POST['re_password']);

	if (!empty($name) && !empty($email) && !empty($pass) && !empty($verpass)) {
		if ($pass != $verpass) {
			$_SESSION['error'] = "passowords do not match";
			header('location: ./');
		}
		$password = password_hash($pass, PASSWORD_DEFAULT);

		$add = $conn->prepare("INSERT INTO `users` (`name`, `email`, `password`) VALUES (?, ?, ?) ");
		if ($add->execute(array($name, $email, $password))) {
			$_SESSION['message'] = 'Succesful signed up please login to continue';
			header('location: login.php');
		}else{
			$_SESSION['error'] = 'Failed to signup Please Try again';
			header('location: ./');
		}
	}else{
		$_SESSION['error'] = 'Please fill in all the fields';
		header('location: ./');
	}
}
?>