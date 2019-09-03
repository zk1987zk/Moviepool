<?php
class MySQLDatabase{
	//$link = null;
	function connect($user, $password, $database){ 
		//like this.link in java. (object.link)
		$this->link = mysqli_connect('localhost', $user, $password);//build the connection
		if(!$this->link){
			die('Not connected : ' . mysqli_connect_error());
		}

		$db = mysqli_select_db($this->link, $database);//Set the current active database

		if(!$db){
			die ('Cannot use : ' . $database);
		}
		return $this->link;
	}

	
	function disconnect(){ 
		mysqli_close($this->link);
	}
}
?>