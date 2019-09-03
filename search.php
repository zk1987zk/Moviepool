<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- choose what version of Internet Explorer the page should be rendered -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--Compatible with the screen width-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MoviePool</title>
		<!-- Bootstrap -->
    <link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
    <?php
          session_start(); 
          include('connectMySQL.php');
          $db = new MySQLDatabase(); // create a Database object
          $db->connect("s4460184", "POxPEHj00AhgYxGv", "moviepool");
    ?>
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
    <script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
    <style>
      body { 
        background: url(img/movie.jpg) no-repeat center center fixed; 
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
            <a class="nav-link" href="movie.php" id="current" style="color:white">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php" style="color:white">Contact</a>
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
    </nav>
  <div class="col-md-8 offset-2" style="background-color:#f0f3f5">
   <div class="jumbotron" style="background-color:#f0f3f5">      
    <form class="form-inline my-2 my-lg-0" method="POST" action="search.php">
        <font color="#007bff"><h1>MoviePool</h1></font>
        <input name="searchword" class="form-control mr-sm-2" type="search" placeholder="Search movies" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
    </form>
    </div>

    <div class="row">
      <?php 
      $keyword = $_POST["searchword"];
      $query = "select * from Movies where movie_name LIKE '%$keyword%'";
      $result = mysqli_query($db->link,$query);
      while($row = mysqli_fetch_array($result)){
        echo '<div class="leftcolumn" style="background-color:#f8f9fa">
                <img src="'.$row['movie_url'].'"'.'height="100%" width="100%"></div>';
        echo '
              <div class="rightcolumn" style="background-color:#f8f9fa">  
              <h2>'.$row['movie_name'].'</h2>
              <p>'.$row['movie_desc'].'<a href="movieInfo.php?id='.$row['movie_id'].'">Read more</a></p>
            </div>';
      }
      ?>
    </div>
  </div>
  </body>
</html>