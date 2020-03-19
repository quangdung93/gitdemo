<?php 

require 'api.class.php';

class API extends RestFullApi {

	function __construct(){
		parent::__construct();
	}

	function random_user(){
		if ($this->method == 'GET'){
			$connection = mysqli_connect("localhost", "root", "", "baocaosu_db") or die("cannot connect");
			$sql = "select * from users";
			$query = mysqli_query($connection,$sql);
			$data = array();
			while($row = mysqli_fetch_assoc($query)){
				$data[] = $row;
			}
			echo "<pre>";
			echo var_dump($data);
			echo "</pre>";
		}
	}
}

$user_api = new API();
