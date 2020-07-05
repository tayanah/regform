<?php 
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['email'])) {
	header('location: login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		body {
		  background-size: cover;
		  background-repeat: no-repeat;
		  background-color: #464646;
		}

		h1 {
		  color: #f2f2f2;
		  font-size: 400%;
		  font-family: Lobster, Arial;
		}

		h2 {
		  color: #f2f2f2;
		  font-size: 50px;
		  font-family: Lobster, Arial;
		  text-align: center;
		}

		span {
		  display: inline-block;
		  vertical-align: middle;
		  line-height: 150%;
		}

		.profile-name {
		  margin-top: 150px;
		}

		.style-two {
		  border: 0;
		  height: 4px;
		  background-image: linear-gradient(
		    to right,
		    rgba(0, 0, 0, 0),
		    rgba(255, 255, 255, 0.3),
		    rgba(0, 0, 0, 0)
		  );
		}

		button {
		  font-family: Verdana;
		}

		.about {
		  font-family: Verdana;
		  font-size: 22px;
		  color: #000000;
		  line-height: 300px;
		  margin-left: 5%;
		  margin-right: 5%;
		  margin-top: -3%;
		}
		.smallerimage {
		  width: 250px;
		  margin-left: auto;
		  margin-right: auto;
		  display: block;
		  border-radius: 30px;
		}

		.projectimages {
		  margin-top: 40px;
		}

		.projectsample {
		  padding: 20px;
		  width: 25%;
		  height: 25%;
		}

		.navbar {
		  margin-bottom: 0;
		  background-color: #e3f2fd;
		  font-family: Verdana;
		}

		.navbar-nav > li {
		  display: inline-block;
		}

		@media only screen and (max-width: 520px) {
		  p {
		    font-size: 15px;
		  }
		  .projectsample {
		    padding: 10px;
		    width: 60%;
		    height: 60%;
		  }
		  .third-page {
		    height: 2000px;
		  }
		}

	</style>
</head>
<body>
	<div>
    <!-- Makes responsive :) -->
    <div class="navbar navbar-default navbar-fixed-top">
      <ul class="nav navbar-nav" id="topnav">
        <li><a href="home.php">home</a></li>
        <li><a href="login.php">Logout</a></li>
      </ul>
    </div>
    <section id="home"></section>
    <div class="first-page container-fluid">
      <h1 class="text-center profile-name"><?php echo $_SESSION['name']; ?>'s Profile</h1>
      <hr class="style-two">
      </hr>
      <div class="buttons text-center">
        <a href="https://www.freecodecamp.com/katieyang" target="_blank">
          <button class="btn btn-danger btn-lg"><i class="fa fa-twitter"></i>Twitter</button>
        </a>
        <a href="https://github.com/katieyang" target="_blank">
          <button class="btn btn-primary btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-github"></i> Github</button>
        </a>
        <a href="https://ca.linkedin.com/in/katie-yang-b1746b6a" target="_blank">
          <button class="btn btn-warning btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-instagram"></i> Instagram</button>
        </a>
      </div>
    </div>
    <section id="about">
      <div class="second-page">
        <br></br>
        <div class="about">
          <span>
            <h2>Welcome</h2>
            <p>Greetings welcome to my login system you can now see your profile</p>
          </span>
        </div>
      </div>
    </section>
  </div> <!-- for container-fluid div -->
</body>
</body>
</html>