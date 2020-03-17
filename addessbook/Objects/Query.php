<?php 

//Include Connection class here..
include_once "Connection.php";

Class Query extends Connection {
	
	// public function __construct()
	// {ll
	//    parent::_construct();
	// }

	public function display()
	{
	  //your select code here
		$sql = "SELECT * FROM address";
		$getall = $this->connect()->query($sql);
		while($row = $getall->fetch()){
			echo $row['name'].$row['phone'].$row['email'];

		}
	}

	public function insert($get)
	{
	  //your insert code here
	}

	public function update($id,$get)
	{
	 //your update code here
	}

	public function delete($id)
	{
	 //your delete code
	}
} 


