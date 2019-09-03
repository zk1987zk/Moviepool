<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- choose what version of Internet Explorer the page should be rendered -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--Compatible with the screen width-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reset password</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
        <?php
            session_start(); 
        ?>
        
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <style>
    body { 
      background: url(img/home.jpg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    </style>
    </head>

    <!--<body style="background-color:#0CF">-->
    <body background="img/theme.jpg">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
       <a class="navbar-brand" href="index.php" style="color:#007bff;font-family: 'Passion One', cursive; font-size:30px;">MoviePool</a>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="movie.php">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="news.php">News</a>
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
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-warning" type="submit">Search</button>
            </form>
        </nav>
        <div class="col-lg-4 offset-4">
            <div class ="container">
                <div class ="jumbotron" style = "margin-top:100px">
                <h2>Reset password</h2>
                <br></br>
                <form method="POST" action="resetPWdb.php">
                    <div class="form-group">
                        <input name='username' type="text" class = "form-control" placeholder = "Enter username">
                        <span id="neUN" style="color:red"></span>
                    </div>
                     <div class="form-group">
                        <input name='email' type="text" class = "form-control" placeholder = "Enter your email">
                        <span id="umEM" style="color:red"></span>
                    </div>
                    <div class="form-group">
                        <input name='newpassword' type="password" class = "form-control" placeholder = "Enter new password">
                    </div>
                    <div class="form-group">
                        <input name='newpassword2' type="password" class = "form-control" placeholder = "Retype new password">
                        <span id="differnewPW" style="color:red"></span>
                    </div>
                
                    <button type="submit" class="btn btn-danger form-control">Reset</button>
                </form>
                </div>
            </div>
        </div>
    </body>
    <?php
    if(isset($_SESSION['checkUN'])){
      echo '<script type="text/javascript">';
      echo 'document.getElementById("neUN").innerHTML = " Username does not exist! "';
      echo '</script>';
    }
    if(isset($_SESSION['checkEM'])){
      echo '<script type="text/javascript">';
      echo 'document.getElementById("umEM").innerHTML = " Please check the email is incorrect!"';
      echo '</script>';
    }
    if(isset($_SESSION['differnewinfo'])){
      echo '<script type="text/javascript">';
      echo 'document.getElementById("differnewPW").innerHTML = " Check that two passwords are different!"';
      echo '</script>';
    }
    unset($_SESSION['checkUN']);
    unset($_SESSION['checkEM']);
    unset($_SESSION['differnewinfo']);
  ?>
</html>
