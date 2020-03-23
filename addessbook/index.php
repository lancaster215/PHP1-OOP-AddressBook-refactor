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
	<link rel="stylesheet" href="./design/style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<h2 style="margin:0;text-align:center;">Address Book</h2>
	<?php

	if($mode == "edit"){
		echo '<div id="open" class="center w3-modal" style="display:block;">
		<div class="w3-modal-content w3-round " style="width:30%;">
		<div class="w3-container w3-card-4">
		<button class="btn w3-button" onclick='; echo "document.getElementById('edit').style.display='none'"; echo '>
			<span><a href=';
			echo $self;
			echo'?mode=none>&times;</a></span>
		</button>
		<h2>Edit Contact</h2>
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
		</form>
		</div>
		</div>
		</div>';
	}else if($mode == "edited"){
		$all->update($name, $phone, $email, $id);
	}else if($mode == "add"){
		echo '<div id="open" class="center w3-modal" style="display:block;">
		<div class="w3-modal-content w3-round " style="width:30%;">
		<div class="w3-container w3-card-4">
		<button class="btn w3-button" onclick='; echo "document.getElementById('open').style.display='none'"; echo '>
			<span><a href=';
			echo $self;
			echo'?mode=none>&times;</a></span>
		</button>
		<h2>Add Contact</h2>
		<form action='.$_SERVER['PHP_SELF'].' method=GET> 
			<table>
				<tr><td>Name:</td><td><input type="text" name="name" /></td></tr> 
				<tr><td>Phone:</td><td><input type="text" name="phone" /></td></tr> 
				<tr><td>Email:</td><td><input type="text" name="email" /></td></tr> 
				<tr><td align="center"><input type="submit" /></td></tr>
				<input type=hidden name=mode value=added>
			</table> 
		</form>
		</div>
		</div>
		</div>';
	}else if($mode == "added"){
		$all->insert($name, $phone, $email);
	}else if($mode == "delete"){
		$all->delete($id);
	}
	echo $all->display(); 
	echo "<div class='center mtop'>
			<button 
			onclick='document.getElementById('open')' 
			class='w3-button w3-black'
			>
				<a href=" .$_SERVER['PHP_SELF']. "?mode=add>Add Contact</a>
			</button>
		</div>";
	?>
</body>
</html>