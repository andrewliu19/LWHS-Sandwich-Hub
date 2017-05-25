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
$search = $conn->real_escape_string($_POST["search"]);
$order = implode($_POST["order"]);
if (!isset($_POST["searchOptionMeat"])) {
	$searchOptionMeat = "";
} else {
	$searchOptionMeat = implode($_POST["searchOptionMeat"]);
}
if (!isset($_POST["searchOptionCheese"])) {
	$searchOptionCheese = "";
} else {
	$searchOptionCheese = implode($_POST["searchOptionCheese"]);
}

$sql = "SELECT ID, name, bread, meat, cheese, condiments, toppings, extras, dates FROM submissions WHERE (name LIKE '%" . $search .  "%' OR bread LIKE '%" . $search."%' OR meat LIKE '%" . $search."%' OR cheese LIKE '%" . $search."%' OR condiments LIKE '%" . $search."%' OR toppings LIKE '%" . $search."%' OR extras LIKE '%" . $search."%' OR dates LIKE '%" . $search."%') AND (meat LIKE '%" . $searchOptionMeat."%') AND (cheese LIKE '%" . $searchOptionCheese."%')  ORDER BY `ID` {$order} ";

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

<br>
<form action= "search.php" method="post" />
<b style="font-family: Snell Roundhand; font-size: 25px">Search:</b>
<input type="text" name="search" value= <?php echo "\"".$_POST["search"]."\"" ?>>

<label>
    <input type="checkbox" class="radio" value="None" name="searchOptionMeat[]" <?php if (!isset($_POST["searchOptionMeat"])) {
	echo "";
} else {
	echo "checked";
}
    ?> />Vegetarian?</label>
<label>

    <input type="checkbox" class="radio" value="None" name="searchOptionCheese[]" <?php 
    if (!isset($_POST["searchOptionCheese"])) {
	echo "";
} else {
	echo "checked";
}
?>
    />Lactose-Intolerant?</label><br/><br>

    <b style="font-family: Snell Roundhand; font-size: 25px">Order by:</b><br>
<label>
    <input type="radio" class="radio" value="DESC" name="order[]" <?php if ($order == "DESC") {
	echo "checked";
} else {
	echo "";
}
?>
    />Most recent to oldest sandwiches</label><br>
<label>
    <input type="radio" class="radio" value="ASC" name="order[]" <?php if ($order == "ASC") {
	echo "checked";
} else {
	echo "";
}
?>
    />Oldest to most recent sandwiches</label><br/><br>

<button type"Submit">Search and reorder</button>
</form>
<br>

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
	<th>Reviews</th>
	<th>Time Posted</th>
	<tr>

	<?php
	while ($submissions=$records->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$submissions['ID']."</td>";
		echo "<td><b>".$submissions['name']."</b></td>";
		echo "<td>".$submissions['bread']."</td>";
		echo "<td>".$submissions['meat']."</td>";
		echo "<td>".$submissions['cheese']."</td>";
		echo "<td>".$submissions['condiments']."</td>";
		echo "<td>".$submissions['toppings']."</td>";
		echo "<td>".$submissions['extras']."</td>";
		echo "<td><a href=\"viewreview.php?name=".$submissions['name']."&type=ID&order=DESC\">Reviews</a></td>";
		echo "<td nowrap>".$submissions['dates']."</td>";
		echo "</tr>";
	}
	?>
	</table>

</body>

</html>