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
          if(!isset($_SESSION['admin'])){
            header("Location:login.php");
          }
    ?>
        
    <script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
	</head>

  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
      <a class="navbar-brand" style="color:#007bff"; href="index.php">MoviePool</a>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="movie.php">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <?php
              { 
                echo '<li class="nav-item"> <a class="nav-link" href="logout.php"> Admin/Logout</a></li>';
              }
            ?>
        </ul>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning" type="submit">Search</button>
        </form>
    </nav>
  <div class="row">
      <div class="col-md-6 offset-3">
        <div class ="jumbotron" style = "margin-top:100px">
          <form class="form-horizontal" action="upload_file.php" method = "POST" enctype="multipart/form-data">
          <fieldset>
            <h2 class="text-center">Upload Movie</h2>   

            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Movie Name</label>
              <div class="col-md-12">
                <input name='movie_name' type="text" placeholder="Movie name" class="form-control">
              </div>

              <div class="form-group" style = "margin-top:10px">
                <div class="col-md-12 ">
                  <label for="file_upload" class="btn btn-info">
                    Choose File <input type="file" name="file" id="file_upload" style="display: none;">
                  </label>    
                  <label id="selected_file"></label>
                </div>
              </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="message">Movie Description</label>
              <div class="col-md-12">
                <textarea class="form-control" name='movie_desc' placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="message">Release Date</label>
              <div class="col-md-12">
                <input name='movie_date' type="date" placeholder="Release Date" class="form-control">
              </div>
            </div>

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

    <script>
      $('#file_upload').change(function() {
        $("#selected_file").text(this.files[0].name + " is selected!");
      })
    </script>
  </body>
</html>