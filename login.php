<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- choose what version of Internet Explorer the page should be rendered -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--Compatible with the screen width-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<!-- Bootstrap -->
		 <link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
		<?php
      		session_start(); 
    	?>
    	<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script> document.getElementById("UserError").innerHTML = "Username does not exist!<br></br>";</script>
		<style>
		    body { 
		      background: url(img/login.jpg) no-repeat center center fixed; 
		      -webkit-background-size: cover;
		      -moz-background-size: cover;
		      -o-background-size: cover;
		      background-size: cover;
		    }
   		</style>
	</head>

	<!--<body style="background-color:#0CF">-->
	<body>
		    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
       <a class="navbar-brand" href="index.php" style="color:#007bff;font-family: 'Passion One', cursive; font-size:30px;">MoviePool</a>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="movie.php">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <?php
              if(isset($_SESSION['username']))
              { 
                echo '<li class="nav-item"> <a class="nav-link" href="logout.php" style="color:white"> '.$_SESSION["username"].'/Logout</a></li>';
              }
            else
              {
                echo '<li class="nav-item"> <a class="nav-link" href="login.php" style="color:white">Login</a></li>';
              }
            ?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="search.php">
          <input  name = 'searchword' class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning" type="submit">Search</button>
        </form>
	    </nav>
		<div class="col-lg-4 offset-4">
			<div class ="container">
				<div class ="jumbotron" style = "margin-top:100px">
				<h2>Please Login</h2>
				<br></br>
				<form method="POST" action="logInValidation.php">
					<div class="form-group">
						<input name='username' type="text" class = "form-control" placeholder = "Enter username">
						<span id="UserError" style="color:red"></span>
					</div>
					<div class="form-group">
						<input name='password' type="password" class = "form-control" placeholder = "Enter password">
						<span id="PWError" style="color:red"></span>
					</div>
					<div class ="checkbox">
						<label>
							<input type="checkbox">
							<small>Remember me</small>
						</label>
					</div>
					<button type="submit" class="btn btn-primary form-control">Login</button>
					<br></br>
					<a href="register.php" class="btn btn-danger form-control" role="button">Register</a><br>
					<div class="form-group">
						<a href="resetPW.php">Forgot password?</a>
					</div>
				</form>
				</div>
			</div>
		</div>


		?>
	</body>
	<?php
		if(isset($_SESSION['UserNE'])){
			echo '<script type="text/javascript">';
			echo 'document.getElementById("UserError").innerHTML = "  Please enter a valid user name!"';
			echo '</script>';
		}
		if(isset($_SESSION['wrongPW'])){
			echo '<script type="text/javascript">';
			echo 'document.getElementById("PWError").innerHTML = "  The password is invalid!"';
			echo '</script>';
		}
		unset($_SESSION['wrongPW']) ;
		unset($_SESSION['UserNE']);
	?>
</html>
