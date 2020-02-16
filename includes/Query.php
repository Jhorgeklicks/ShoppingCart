<?php

	class Query{
		private  $servername = "localhost";
		private  $username	 = "root";
		private  $password = "";
		private  $dbname = "CartSystem";

		public  $conn;

		public function __construct(){
			return $this->connect_db();
		}

		public function connect_db(){
			$this->conn =mysqli_connect($this->servername,$this->username,$this->password, $this->dbname);

			if($this->conn){
				// echo 'connected';
			}else{
				echo 'error connecting database';
			}
		}

		public function PostData($data){
			return mysqli_real_escape_string($this->conn, $_POST[$data]);
		}
		
		public function execute_query($query){
			return mysqli_query($this->conn, $query);
		}

	}
 ?>