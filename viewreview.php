<?php

$servername = "25.15.21.40:3307";
$username = "25.15.21.40";
$password = "password";
$dbname = "sandwich";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, rating, review_title, review_content, review_date FROM reviews";

$records=$conn->query($sql);

$conn->close();

?>
<html>
<head>
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
	while ($review=$records->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$review['ID']."</td>";
		echo "<td>".$review['rating']."</td>";
		echo "<td>".$review['review_title']."</td>";
		echo "<td>".$review['review_content']."</td>";
		echo "<td>".$review['review_date']."</td>";
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>