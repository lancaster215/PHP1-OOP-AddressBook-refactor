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
		echo "<table>
				<tr>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Email</th>
					<th>Action</th>
				</tr>";
		$arr = array();
		$sql = "SELECT * FROM address ORDER BY name ASC";
		$getall = $this->connect()->query($sql);
		while($row = $getall->fetch()){
			$arr[] = array(	"id"=>$row['id'],
							"name"=>$row['name'], 
							"phone"=>$row['phone'], 
							"email"=>$row['email']
						);
		}
		foreach($arr as $row){
			echo "<tr>
					<td>".$row["name"]."</td>
					<td>".$row["phone"]."</td>
					<td>".$row["email"]."</td>
					<td>
						<a 
						href='./index.php?
						name=".$row["name"]."
						&phone=".$row["phone"]."
						&email=".$row["email"]."
						&id=".$row["id"]."
						&mode=edit'>
							Edit
						</a> 
						<a 
						href='./index.php?
						&id=".$row["id"]."
						&mode=delete'
						>
							Delete
						</a>
					</td>
				</tr>";
		}
		echo "</table>";
	}

	public function insert($name, $phone, $email)
	{
	  //your insert code here
		$sql = "INSERT INTO address(name, phone, email) VALUES (?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name, $phone, $email]);
	}

	public function update($name, $phone, $email, $id)
	{
	 //your update code here
		$sql = "UPDATE address SET name=?, phone=?, email=? WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name, $phone, $email, $id]);
	}

	public function delete($id)
	{
	 //your delete code
		$sql = "DELETE FROM address WHERE id=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
	}
} 


