<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- choose what version of Internet Explorer the page should be rendered -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--Compatible with the screen width-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MoviePool</title>
		<!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
    <?php
          session_start(); 
          include('connectMySQL.php');
          $db = new MySQLDatabase(); // create a Database object
          $db->connect("root", "", "moviepool");
    ?>
    <script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
	</head>

  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
       <a class="navbar-brand" href="index.php" style="color:#007bff;font-family: 'Passion One', cursive; font-size:30px;">MoviePool</a>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" id="current" href="movie.php">Movies</a>
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
    </nav>
  <div class="col-md-8 offset-2" style="background-color:#f0f3f5">
   <div class="jumbotron" style="background-color:#f0f3f5">      
    <form class="form-inline my-2 my-lg-0">
        <font color="#007bff"><h1>MoviePool</h1></font>
        <input class="form-control mr-sm-2" type="search" placeholder="Search movies" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
    </form>
    </div>

    <div class="row">
      <?php 
      $movie_id = $_GET["id"];
      $query = "select * from movies where movie_id=".$movie_id;
      $result = mysqli_query($db->link,$query);
      $row = mysqli_fetch_array($result);
        //print "Name: {$row['studentName']} has ID: {$row['id']}"."</br>"; //$row: attribute/value pairs
      echo '<div class="leftcolumn" style="background-color:#f8f9fa">
              <img src="'.$row['movie_url'].'"'.'height="100%" width="100%"></div>';
      echo '
            <div class="rightcolumn" style="background-color:#f8f9fa">  
            <h2>'.$row['movie_name'].'</h2>
            <p class="movieinfo">RELEASE DATE:'.$row['movie_date'].'
            <p>'.$row['movie_desc'].'</div>';

      $query2 = "select * from comments where m_id=".$movie_id;
      $result2 = mysqli_query($db->link,$query2);
     
      while($row2 = mysqli_fetch_array($result2)){
        echo '<div class="leftcolumn" style="background-color:#f8f9fa">
                <p>'.$row2['Username'].'</p></div>';

        if (isset($_SESSION['username']) && $_SESSION['username']==$row2['Username']){
          echo '
              <div class="rightcolumn" style="background-color:#f8f9fa">  
              <p>'.$row2['contents'].'</p>
              <p align="right">'.$row2['comment_datetime'].
              '</br> <a href="deleteComment.php?mid='.$movie_id.'&cid='.$row2['comment_id'].
              '"style="color:red">Delete</a></div>';
        } else {
          echo '
              <div class="rightcolumn" style="background-color:#f8f9fa">  
              <p>'.$row2['contents'].'</p>
              <p align="right">'.$row2['comment_datetime'].'
              </div>';
        }
      }
      $db->disconnect();
      ?>

      <?php
        if(isset($_SESSION['username'])){
          echo '
            <form method="POST" action="add_comment.php?id='.$movie_id.'">
            <div class="col-md-10 offset-1">
              <textarea id="textarea" class="form-control" name="comment" placeholder="Please leave your comment here..." rows="5" cols="150"></textarea>
            </div>
            <div class="col-md-10 offset-1 text-right">
              <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div> 
            </form>';
        }
      ?>
    </div>
  </div>
  </body>
</html>