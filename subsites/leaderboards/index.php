<!DOCTYPE html>
<?php

//login info for MySQL to collect/submit information from the database
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

//Selects all the tables listed (which store the information of the sandwich, such as what type of meet or cheese was submitted 
//for a particular sandwich). Orders it by Descending order of ID by default (which can be changed when the "Search and reorder" button is pressed)
$sql = "SELECT ID, name, bread, meat, cheese, condiments, toppings, extras, dates FROM submissions ORDER BY `ID` DESC";

//Submits the "$sql" variable to be analyzed by the MySQL query 
$records=$conn->query($sql);

//closes the connection built to MySQL (to prevent using extra memory and make the database and page more efficient)
$conn->close();
?>

<html>
<!-- Heading code -->
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

<!-- buttons to search through all the sandwiches with a specific string and/or a specific restriction (such as being vegetarian or lacking cheese) -->
<br>
<form action= "search.php" method="post" />
<b style="font-family: Snell Roundhand; font-size: 25px">Search:</b> <input type="text" name="search">

<label>
    <input type="checkbox" class="radio" value="None" name="searchOptionMeat[]" />Vegetarian?</label>
<label>
    <input type="checkbox" class="radio" value="None" name="searchOptionCheese[]" />Lactose-Intolerant?</label><br/><br>
    <b style="font-family: Snell Roundhand; font-size: 25px">Order by:</b><br>
<label>
    <input type="radio" class="radio" value="DESC" name="order[]" checked/>Most recent to oldest sandwiches</label><br>
<label>
    <input type="radio" class="radio" value="ASC" name="order[]" />Oldest to most recent sandwiches</label><br/><br>
<button type"Submit">Search and reorder</button>
</form>
<br>

<!-- Makes a table with all the information gathered from the MySQL database and lists their review links to see the sandwiches reviews -->
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

//Automatically generates a URL to click to view the reviews based on the sandwich in that row and automatically sorts the reviews for you (using "&type=ID&order=DESC\" and $_GET() in the next page)
		echo "<td><a href=\"viewreview.php?name=".$submissions['name']."&type=ID&order=DESC\">Reviews</a></td>";
		echo "<td nowrap>".$submissions['dates']."</td>";
		echo "</tr>";
	}
	?>
	</table>

</body>

</html>