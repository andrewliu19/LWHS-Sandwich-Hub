<?php

$db_user = 'root';
$db_pass = '';
$db_name = 'sandwich';
$db_host = 'localhost';

$time = time();

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

// $title = $mysqli->real_escape_string($_POST['title']);
// $content = $mysqli->real_escape_string($_POST['content']);

$title = $_POST["title"];
$content = $_POST["content"];

$query = "INSERT INTO reviews (review_title, review_content, review_date) VALUES ('{$title}', '{$content}', FROM_UNIXTIME({$time}))";

if ($mysqli->connect_errno) {
	printf("Connect failed: %s/n", $mysqli->connect_error);
	exit();
}else{
	echo 'Successfully sent. ';
	echo 'Click <a href="index.php">HERE</a> to return back to the main page.';
}

$result = $mysqli->query($query);

$mysqli->close();

// print_r($result);




?>