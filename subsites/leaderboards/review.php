<?php
// Basic word filter used to replace any explicit words (found in the array "$filter_terms" below) with the word "ASTERISK"
function wordFilter($text)
{
    $filter_terms = array('/\bass(e?)?\b/i', '/shit(e|t?)?/i', '/fuck/i', '/bitch(e?)?/i', '/penis(e?)?/i', '/vagina/i', '/dick/i');
    $filtered_text = preg_replace($filter_terms, 'ASTERISK', $text);
    return $filtered_text;
}

//Checks to see if the "Rating", "Title", and/or "Content" inputs were left blank, and gives a default message/rating
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

//login info for MySQL to collect/submit information from the database
$db_user = 'root';
$db_pass = '';
$db_name = 'sandwich';
$db_host = 'localhost';

//Gets the name of the sandwich (whose review is being viewed) from the url bar, which it then "decodes" and searches for in the "sandwiches" database
$tableName = htmlspecialchars_decode($_GET["name"]);

//collects the current time to submit it with the review
$time = time();

//connects to MySQL
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Sanitizes the "$title" and "$content" variables to prevent any malicous injections from reaching MySQL
$titleForDB = $mysqli->real_escape_string(wordFilter($title));
$contentForDB = $mysqli->real_escape_string(wordFilter($content));

//Submits the review title, content, and date into the specific sandwiches table (defined by "$tableName")
$query = "INSERT INTO `{$tableName}` (rating, review_title, review_content, review_date) VALUES ('{$rating}', '{$titleForDB}', '{$contentForDB}', FROM_UNIXTIME({$time}))";


//Error message
if ($mysqli->connect_errno) {
	printf("Connect failed: %s/n", $mysqli->connect_error);
	exit();
}else{

//The opposite of an error message, I guess. It's like a success message, which is pretty nice to see :)
	echo "Successfully sent. ";
	echo "Click <a href=\"index.php\">HERE</a> to return back to the Leaderboards page. <br>";
	echo "Click <a href=\"viewreview.php?name=".$tableName."&type=ID&order=DESC\">HERE</a> to return back to the review page for ".$tableName.".";
}
$result = $mysqli->query($query);

$mysqli->close();
?>