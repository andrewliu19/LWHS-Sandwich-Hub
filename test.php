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

$sql = "SELECT ID, review_title, review_content, review_date FROM MyGuests";
$result = $conn->query($sql);
$test = $result->num_rows;
if ($test > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ID"]. " - Name: " . $row["review_title"]. " " . $row["review_content"]. " " . $row["review_date"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();



?>