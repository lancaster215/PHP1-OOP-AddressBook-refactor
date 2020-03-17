<?php error_reporting(1); ?>

<?php 
//Inlude the Query class here ..
include_once "Objects/Query.php";
$self = $_SERVER['PHP_SELF'];

//Default methods
$test = new Query;
echo $test->display()
/**
	display()
	insert($_GET)
	update($id,$_GET)
	delete($id)
*/

?>


<!-- Your HTML below php code below-->
