<!DOCTYPE html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sandwich";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, name, bread, meat, cheese, condiments, toppings, extras FROM submissions";

$records=$conn->query($sql);

$conn->close();

?>
<html>

<head>
<title> LWHS Sandwich Hub </title>
<link rel="stylesheet" type="text/css" href="../../main.css"/>
</head>

<body>
<img src="../../images/sandwich.png" alt="Sandwich" height="50" width="90">

<script src="javascript.js"></script>

<h1> Sandwich Hub </h1>
<div style="z-index: -1;position: absolute;top:0px;left:-30px;width:100%;height:130px; background-color: black;"></div>

<ul>
  <li><a href="../../index.php">Home</a></li>
  <li><a href="../designer/index.php">Design a Sandwich!</a></li>
  <li><a href="../randomizer/index.php">Randomize a Sandwich!</a></li>
  <li><a class="active" href="index.php">Leaderboards</a></li>
</ul>

<table width="1000" border="10" cellpadding="10" cellspacing="1">
	<tr>
	<th>ID</th>	
	<th>Name</th>
	<th>Bread</th>
	<th>Meat</th>
	<th>Cheese</th>
	<th>Condiments</th>
	<th>Toppings</th>
	<th>Extras</th>
	<tr>

	<?php
	while ($submissions=$records->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$submissions['ID']."</td>";
		echo "<td>".$submissions['name']."</td>";
		echo "<td>".$submissions['bread']."</td>";
		echo "<td>".$submissions['meat']."</td>";
		echo "<td>".$submissions['cheese']."</td>";
		echo "<td>".$submissions['condiments']."</td>";
		echo "<td>".$submissions['toppings']."</td>";
		echo "<td>".$submissions['extras']."</td>";
		echo "</tr>";
	}
	?>
	</table>

</body>

</html>