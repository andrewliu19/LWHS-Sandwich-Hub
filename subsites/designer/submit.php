<?php

$safename = $_POST["name"];
$bread = implode($_POST["bread"]);
$meat = implode($_POST["meat"]);
$cheese = implode($_POST["cheese"]);
$condiments = implode($_POST["condiments"]);
$toppings = implode($_POST["toppings"]);
$extras = implode($_POST["extras"]);
// optional
echo "<h3>You submitted the following:<h3>";
echo "<h2>Name:</h2>";
echo $safename. "<br />";
echo "<h2>Bread:</h2>";
echo $bread. "<br />";
echo "<h2>Meat:</h2>";
echo $meat. "<br />";
echo "<h2>Cheese:</h2>";
echo $cheese. "<br />";
echo "<h2>Condiments:</h2>";
echo $condiments. "<br />";
echo "<h2>Toppings:</h2>";
echo $toppings. "<br />";
echo "<h2>Extras:</h2>";
echo $extras. "<br /><br /><br />";



$db_user = 'root';
$db_pass = '';
$db_name = 'sandwich';
$db_host = 'localhost';

// $time = time();

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

$name = $mysqli->real_escape_string($_POST["name"]);

$query = "INSERT INTO submissions (name, bread, meat, cheese, condiments, toppings, extras) VALUES ('{$name}', '{$bread}', '{$meat}', '{$cheese}', '{$condiments}', '{$toppings}', '{$extras}')";

if ($mysqli->connect_errno) {
	printf("Connect failed: %s/n", $mysqli->connect_error);
	exit();
}else{
	echo '<b>Successfully sent submission. </b>';
	echo '<b>Click <a href="index.php">HERE</a> to return back to the designer page.</b>';
}

$result = $mysqli->query($query);

$mysqli->close();
?>