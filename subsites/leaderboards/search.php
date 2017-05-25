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

//Gathers the information from the search bar in "leaderboards/index.php" and sanitizes it to make it compatible with MySQL
$search = $conn->real_escape_string($_POST["search"]);

//Collects the information about what order (ascending or descending) the list should be in, chosen from the page before.
$order = implode($_POST["order"]);

//checks to see if the "vegetarian" button was checked, and if so, then makes it so that MySQL only displays sandwiches with "None" as their meat
if (!isset($_POST["searchOptionMeat"])) {
	$searchOptionMeat = "";
} else {
	$searchOptionMeat = implode($_POST["searchOptionMeat"]);
}

//checks to see if the "lactose-intolerant" button was checked, and if so, then makes it so that MySQL only displays sandwiches with "None" as their cheese
if (!isset($_POST["searchOptionCheese"])) {
	$searchOptionCheese = "";
} else {
	$searchOptionCheese = implode($_POST["searchOptionCheese"]);
}

//Selects all the sandwiches in the Submissions table where they meet the criteria of having the "$search" string ANYWHERE in
//their values (such as meat or name), and also checks if they meet the "vegetarian" and/or "lactose-intolerant" requirement from above, if applicable.
//It then orders all the submissions by the order chosen under "$order"
$sql = "SELECT ID, name, bread, meat, cheese, condiments, toppings, extras, dates FROM submissions WHERE (name LIKE '%" . $search .  "%' OR bread LIKE '%" . $search."%' OR meat LIKE '%" . $search."%' OR cheese LIKE '%" . $search."%' OR condiments LIKE '%" . $search."%' OR toppings LIKE '%" . $search."%' OR extras LIKE '%" . $search."%' OR dates LIKE '%" . $search."%') AND (meat LIKE '%" . $searchOptionMeat."%') AND (cheese LIKE '%" . $searchOptionCheese."%')  ORDER BY `ID` {$order} ";

//Submits the "$sql" variable to be analyzed by the MySQL query 
$records=$conn->query($sql);

//closes the connection built to MySQL (to prevent using extra memory and make the database and page more efficient)
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

<!-- Header code -->
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
<b style="font-family: Snell Roundhand; font-size: 25px">Search:</b>
<input type="text" name="search" value= <?php echo "\"".$_POST["search"]."\"" ?>>

<!-- checks to see if this button had been checked in the previous page (using the value of "$searchOptionMeat", and if so, displays the button as checked -->
<label>
    <input type="checkbox" class="radio" value="None" name="searchOptionMeat[]" <?php if (!isset($_POST["searchOptionMeat"])) {
	echo "";
} else {
	echo "checked";
}
    ?> />Vegetarian?</label>
<label>

<!-- checks to see if this button had been checked in the previous page (using the value of "$searchOptionCheese", and if so, displays the button as checked -->
    <input type="checkbox" class="radio" value="None" name="searchOptionCheese[]" <?php 
    if (!isset($_POST["searchOptionCheese"])) {
	echo "";
} else {
	echo "checked";
}
?>
    />Lactose-Intolerant?</label><br/><br>

<b style="font-family: Snell Roundhand; font-size: 25px">Order by:</b><br>

<!-- checks to see if this button had been checked in the previous page (using the value of "$order", and if so, displays the button as checked -->
<label>
    <input type="radio" class="radio" value="DESC" name="order[]" <?php if ($order == "DESC") {
	echo "checked";
} else {
	echo "";
}
?>
    />Most recent to oldest sandwiches</label><br>

<!-- checks to see if this button had been checked in the previous page (using the value of "$order", and if so, displays the button as checked -->
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