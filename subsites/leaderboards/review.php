<?php
function wordFilter($text)
{
    $filter_terms = array('/\bass(e?)?\b/i', '/shit(e|t?)?/i', '/fuck/i', '/slut/i', '/bitch(e?)?/i', '/penis(e?)?/i', '/vagina/i', '/dick/i');
    $filtered_text = preg_replace($filter_terms, 'Peter', $text);
    return $filtered_text;
}

if (!isset($_POST["rating"])) {
	$rating = "5";
} else {
	$rating = implode($_POST["rating"]);
}

if (strlen($_POST["title"])<1) {
	$title = "Unnamed Review";
} else {
	$title = wordFilter($_POST["title"]);
}

if (strlen($_POST["content"])<1) {
	$content = "No content entered";
} else {
	$content = wordFilter($_POST["content"]);
}

$db_user = 'root';
$db_pass = '';
$db_name = 'sandwich';
$db_host = 'localhost';
$tableName = htmlspecialchars_decode($_GET["name"]);

$time = time();

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

$titleForDB = $mysqli->real_escape_string(wordFilter($title));
$contentForDB = $mysqli->real_escape_string(wordFilter($content));

$query = "INSERT INTO `{$tableName}` (rating, review_title, review_content, review_date) VALUES ('{$rating}', '{$titleForDB}', '{$contentForDB}', FROM_UNIXTIME({$time}))";



if ($mysqli->connect_errno) {
	printf("Connect failed: %s/n", $mysqli->connect_error);
	exit();
}else{
	echo "Successfully sent. ";
	echo "Click <a href=\"index.php\">HERE</a> to return back to the Leaderboards page. <br>";
	echo "Click <a href=\"viewreview.php?name=".$tableName."&type=ID&order=DESC\">HERE</a> to return back to the review page for ".$tableName.".";
}
$result = $mysqli->query($query);

$mysqli->close();

// print_r($result);




?>