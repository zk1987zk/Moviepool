<!-- restriction on file upload-->
<?php
//restriction
include('connectMySQL.php');
$db = new MySQLDatabase(); // create a Database object
$db->connect("s4460184", "POxPEHj00AhgYxGv", "moviepool");

$m_name = $_POST['movie_name'];
$m_desc = $_POST["movie_desc"];
$m_date = $_POST["movie_date"];
$url = "upload/".$_FILES["file"]["name"];


if ((($_FILES["file"]["type"] == "image/gif") 
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "image/pjeg"))
	&& ($_FILES["file"]["size"] < 20000)) { 
	if ($_FILES["file"]["error"] > 0){ 
		echo "Error: " . $_FILES["file"]["error"] . "<br />"; 
	}
	 { 
		// print file info
		echo "Upload: ". $_FILES["file"]["name"] ."<br />";
		echo "Type: ". $_FILES["file"]["type"] ."<br />";
		echo "Size: ". ($_FILES["file"]["size"]/1024) ."<br />";
		echo "Temp file: ". $_FILES["file"]["tmp_name"] ."<br />";

		//check file exists
		if (file_exists("upload/".$_FILES["file"]["name"])){
			echo $_FILES["file"]["name"]." already exists. ";
		} else {//save the file
			//move_uploaded_file(filename, destination) return boolean
			move_uploaded_file($_FILES["file"]["tmp_name"], 
				"upload/" . $_FILES["file"]["name"]);
			echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			header("Location:movie.php");

			$query = "insert into Movies(movie_name, movie_desc, movie_url, movie_date) values ('$m_name','$m_desc','$url', '$m_date')";
			$result = mysqli_query($db->link,$query);
			if(!$result){
				die(mysqli_error($db->link)); // useful for debugging
			}
		}
	}
}else if( $_FILES['file']['size']==0){
	echo "No file is selected";
}else{ 
	echo "Invalid file"; 
	//header("Location:admin.php");
}

$db->disconnect();
?>