<?php 
$conn  = new PDO("mysql:host=localhost;dbname=users", 'root', '');
if (!$conn) {
	echo "failed to connect to the dabatase";
}

function cleaner($data){
	return  htmlentities(stripslashes(stripcslashes(htmlspecialchars($data))));
}

if (isset($_POST['login'])) {
	//check for login 

	$email = cleaner($_POST['email']);
	$pass = cleaner($_POST['passoword']);
	if (!empty($email) && !empty($pass)) {
		$add = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
		$add->execute();
	}else{
		echo "please fill in all the fields";
	}

}

if (isset($_POST['signup'])) {
	$name = cleaner($_POST['name']);
	$email = cleaner($_POST['email']);
	$pass = cleaner($_POST['password']);
	$verpass = cleaner($_POST['pass']);

	if (!empty($name) && !empty($email) && !empty($pass) && !empty($verpass)) {
		$add = $conn->prepare("INSERT INTO `users`  VALUES ?, ?, ? ");
	}else{
		echo "please fill in all the fields";
	}
}
?>