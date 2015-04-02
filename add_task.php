
<?php
	
//$idList = $_POST["idList"];
$listName = $_POST["listName"];

$mysqli = new mysqli('localhost', 'root', '', 'taskmanager');
$query = "INSERT INTO `taskmanager`.`task` ( `name`) VALUES ('$listName')";
$mysqli->query($query);

$mysqli->close();
?>
