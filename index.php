<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- choose what version of Internet Explorer the page should be rendered -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--Compatible with the screen width-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MoviePool</title>
		<!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
		
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <?php
      session_start(); 
    ?>
    <script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
	</head>

  <body>
    <!--Navigation bar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
       <a href="index.php" class= "navbar-brand" style="color:#007bff;font-family: 'Passion One', cursive; font-size:30px;">MoviePool</a>
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
    <!-- End of the navigation bar-->

    <!-- Contents -->
    <div class="slideshow">
      <h1 id="title">Now Showing</h1>
      <div>
        <img class = "topImg" src="img/now/img1.jpg"  width="240" height="320" alt="Figure">
        <img class = "topImg" src="img/now/img2.jpg"  width="240" height="320" alt="Figure">
        <img class = "topImg" src="img/now/img3.jpg"  width="240" height="320" alt="Figure">
        <img class = "topImg" src="img/now/img4.jpg"  width="240" height="320" alt="Figure">
      </div>
      <div>
        <img class = "topImg" src="img/now/img5.jpg"  width="240" height="320" alt="Figure">
        <img class = "topImg" src="img/now/img6.jpg"  width="240" height="320" alt="Figure">
        <img class = "topImg" src="img/now/img7.jpg"  width="240" height="320" alt="Figure">
        <img class = "topImg" src="img/now/img8.jpg"  width="240" height="320" alt="Figure">
      </div>
  </div>
  <div class="content">
      <h1 id="title">Movies</h1>
      <div>
        <img class = "topImg" src="img/now/img4.jpg"  width="240" height="308" alt="Figure">
        <img class = "topImg" src="img/now/img1.jpg"  width="240" height="308" alt="Figure">
        <img class = "topImg" src="img/now/img2.jpg"  width="240" height="308" alt="Figure">
        <img class = "topImg" src="img/now/img3.jpg"  width="240" height="308" alt="Figure">
      </div>
    </br>
  </div>

  <script>
    $(".slideshow > div:gt(0)").hide();

    setInterval(function() {
      $('.slideshow > div:first')
        .fadeOut(0)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('.slideshow');
    }, 3000);
  </script>
  </body>
</html>