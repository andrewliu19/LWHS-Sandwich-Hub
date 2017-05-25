<!DOCTYPE html>
<?php

//login info for MySQL to collect/submit information from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sandwich";

//Gets the name of the sandwich (whose review is being viewed) from the url bar, which it then "decodes" and searches for in the "sandwiches" database
$tableName = htmlspecialchars_decode($_GET["name"]);

//Gets the way the list of reviews is being organized (such as by Time or by Rating, and in descending or ascending order) from the header, 
//if applicable (it automatically organizes it by "Time Posted", given in the URL that came from the leaderboards page)
if (null !== (@$_GET["type"])) {
	$type = @$_GET["type"];
} else {
	$type = @implode($_POST["type"]);
}

//Gets the way the list of reviews is being organized (such as by Time or by Rating, and in descending or ascending order) from the header, 
//if applicable (it automatically organizes it by "Descending", given in the URL that came from the leaderboards page)
if (null !== (@$_GET["order"])) {
	$order = @$_GET["order"];
} else {
	$order = @implode($_POST["order"]);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Searches throught the review table of your given sandwich and organizes it using "$type" and "$order"
$sql = "SELECT ID, rating, review_title, review_content, review_date FROM `{$tableName}` ORDER BY `{$type}` {$order} ";

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

<!-- Offers the user an oppurtunity to submit a review themself, which then passes the information into review.php -->
<h3 style="color:darkred"> Submit a review for <?php echo $tableName ?>: </h3>
<form action= <?php echo "\"review.php?name=".$tableName."\"";  ?> 
method="post" />
<label>
    <input type="radio" class="radio" value="1" name="rating[]" />1</label>
<label>
    <input type="radio" class="radio" value="2" name="rating[]" />2</label>
<label>
    <input type="radio" class="radio" value="3" name="rating[]" />3</label>
<label>
    <input type="radio" class="radio" value="4" name="rating[]" />4</label>
<label>
    <input type="radio" class="radio" value="5" name="rating[]" />5</label><br/>

Title of Review: <input type="text" name="title"><br>
Review: <input type="text" name="content"><br>
<button type"Submit">Submit</button>
</form>

<!-- Offers the user the oppurtunity to organize the list of reviews however they want it, and if it was checked before in the previous version of viewreview.php, then it leaves it as checked -->
<h3 style="color:darkblue"> Reviews from other people for <?php echo $tableName ?>: </h3>
<form action= <?php echo "\"viewreview.php?name=".$tableName."\""; ?> 
method="post" />
    <b>Sort by:</b><br>
<label>
    <input type="radio" class="radio" value="ID" name="type[]" <?php if ($type == "ID") {
	echo "checked";
} else {
	echo "";
}
?>
    />Time Posted</label><br>
 <label>
    <input type="radio" class="radio" value="rating" name="type[]" <?php if ($type == "rating") {
	echo "checked";
} else {
	echo "";
}
?>
    />Rating</label><br>
	<b>Order:</b><br>

<label>
    <input type="radio" class="radio" value="DESC" name="order[]" <?php if ($order == "DESC") {
	echo "checked";
} else {
	echo "";
}
?>
    />Descending</label><br>
<label>
    <input type="radio" class="radio" value="ASC" name="order[]" <?php if ($order == "ASC") {
	echo "checked";
} else {
	echo "";
}
?>
    />Ascending</label><br/>
<button type"Submit">Sort</button>
</form>
<br>

<!-- Lists all the reviews given for a particular sandwich -->
	<title>Review</title>
</head>
<body>
	<table width="600" border="1" cellpadding="1" cellspacing="1">
	<tr>
	<th>ID</th>	
	<th>Rating</th>
	<th>Title</th>
	<th>Review</th>
	<th>Time Posted</th>
	<tr>

	<?php
	while ($tableName=$records->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$tableName['ID']."</td>";
		echo "<td>".$tableName['rating']."</td>";
		echo "<td>".$tableName['review_title']."</td>";
		echo "<td>".$tableName['review_content']."</td>";
		echo "<td>".$tableName['review_date']."</td>";
		echo "</tr>";
	}
	?>
	</table>
</body>

</html>