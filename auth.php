<?php 
session_start();
$conn  = new PDO("mysql:host=localhost;dbname=users", 'root', '');
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
		$login = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
		$login->execute(array($email)); //getch the user record from the db
		$row = $login->fetch(FETCH_ASSOC);
		if ($add->rowCount() > 0) {
			$encpass = password_hash($pass, PASSWORD_DEFAULT); //encripting the passoword
			if ($row['password'] == $encpass) {
				# passwords match you can redirect the user to another page
				$_SESSION['email'] = $email;
				header('location: logedinpage.somethings');
			}else{
				echo "you have entered a wrong password";
			}
		}else{
			echo "user not found on the database";
		}
	}else{
		echo "please fill in all the fields";
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

		$add = $conn->prepare("INSERT INTO `users`  VALUES ?, ?, ? ");
		if ($add->execute(array($name, $email, $pass))) {
			$_SESSION['message'] = 'Succesful signed up please login to continue';
			header('location: login.php');
		}else{
			$_SESSION['error'] = 'Failed to signup Please Try again';
			header('location: ./');
		}
	}else{
		echo "please fill in all the fields";
	}
}
?>