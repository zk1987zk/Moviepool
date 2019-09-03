<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- choose what version of Internet Explorer the page should be rendered -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--Compatible with the screen width-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MoviePool</title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
    <?php
          session_start(); 
    ?>
    <script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
    <style>
      body { 
        background: url(img/Yellow.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
    </style>
	</head>

  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
       <a class="navbar-brand" href="index.php" style="color:#007bff;font-family: 'Passion One', cursive; font-size:30px;">MoviePool</a>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="movie.php">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="current"  href="contact.php">Contact</a>
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
  <div class="row">
      <div class="col-md-4 offset-4">
        <div class ="jumbotron" style = "margin-top:100px">
          <form class="form-horizontal" action="sendMsg.php" method="POST">
          <fieldset>
            <h2 class="text-center">Contact us</h2>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-12">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Email</label>
              <div class="col-md-12">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Message</label>
              <div class="col-md-12">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>