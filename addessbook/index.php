<?php error_reporting(1); ?>

<?php 
//Inlude the Query class here ..
include_once "Objects/Query.php";


//Default methods
$all = new Query;
$self = $_SERVER['PHP_SELF'];
$mode = $_GET['mode'];
$name = $_GET['name'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$id = $_GET['id'];
/**
	display()
	insert($_GET)
	update($id,$_GET)
	delete($id)
*/

?>


<!-- Your HTML below php code below-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Address Book</title>
</head>
<body>
	<h2 style="margin:0;text-align:center;">Address Book</h2>
	<?php

	if($mode == "edit"){
		echo '<h2>Edit Contact</h2> 
		<p> 
		<form action=';
		echo $self; 
		echo '
		method=GET> 
		<table> 
		<tr><td>Name:</td><td><input type="text" value="'; 
		echo $name; 
		echo '" name="name" /></td></tr> 
		<tr><td>Phone:</td><td><input type="text" value="'; 
		echo $phone; 
		echo '" name="phone" /></td></tr> 
		<tr><td>Email:</td><td><input type="text" value="'; 
		echo $email; 
		echo '" name="email" /></td></tr> 
		<tr><td colspan="2" align="center"><input type="submit" /></td></tr> 
		<input type=hidden name=mode value=edited> 
		<input type=hidden name=id value='; 
		echo $id; 
		echo '> 
		</table> 
		</form> </p>';
	}else if($mode == "edited"){
		$all->update($name, $phone, $email, $id);
	}else if($mode == "add"){
		echo '<h2>Add Contact</h2>
		<p> 
		<form action=';
		echo $self;
		echo '
		method=GET> 
		<table>
		<tr><td>Name:</td><td><input type="text" name="name" /></td></tr> 
		<tr><td>Phone:</td><td><input type="text" name="phone" /></td></tr> 
		<tr><td>Email:</td><td><input type="text" name="email" /></td></tr> 
		<tr><td align="center"><input type="submit" /></td></tr>
		<input type=hidden name=mode value=added>
		</table> 
		</form> <p>';
	}else if($mode == "added"){
		$all->insert($name, $phone, $email);
	}else if($mode == "delete"){
		$all->delete($id);
	}
	echo $all->display(); 
	echo "<button><a href=" .$_SERVER['PHP_SELF']. "?mode=add>Add Contact</a></button>";
	?>
</body>
</html>