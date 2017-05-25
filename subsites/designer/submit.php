<?php
// Basic word filter used to replace any explicit words (found in the array "$filter_terms" below) with the word "ASTERISK"
function wordFilter($text)
{
    $filter_terms = array('/\bass(e?)?\b/i', '/shit(e|t?)?/i', '/fuck/i', '/bitch(e?)?/i', '/penis(e?)?/i', '/vagina/i', '/dick/i');
    $filtered_text = preg_replace($filter_terms, 'ASTERISK', $text);
    return $filtered_text;
}

//Random string generator to add a random number to the end of an already-used name, to help remove name repeats and add specificity
//Original random String code found at: http://stackoverflow.com/questions/15821532/get-current-auto-increment-value-for-any-table
function generateRandomString($length = 4) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//Variables for the bread, meat, cheese, condiments, and toppings/extras chosen on the page before
$bread = implode($_POST["bread"]);
$meat = implode($_POST["meat"]);
$cheese = implode($_POST["cheese"]);
$condiments = implode($_POST["condiments"]);

//Checks to see if the "none" checkbox was selected on the toppings section, removing any other option selected, if applicable
if (preg_match('/None/',(implode($_POST["toppings"])))){
	$toppings = "None";
} else {
	$toppings = implode($_POST["toppings"]);
}

//Checks to see if the "none" checkbox was selected on the extras section, removing any other option selected, if applicable
if (preg_match('/None/',(implode($_POST["extras"])))){
	$extras = "None";
} else {
	$extras = implode($_POST["extras"]);
}

//login info for MySQL to collect/submit information from the database
$db_user = 'root';
$db_pass = '';
$db_name = 'sandwich';
$db_host = 'localhost';


$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Checks to see if the name submitted on the page before was already in the database, and if so, it prints an error and gives
//the sandwich a random number at the end. If there was no name submitted, then the "$name" variable is defined as a string reading
//"Unnamed Sandwich" with a random string of numbers at the end.
$name = wordFilter($_POST["name"]);
if (strlen($_POST["name"])<1) {
	$name = "Unnamed Sandwich ".generateRandomString();
	$userNameErr = "SANDWICH WAS UNNAMED, ALTERED SLIGHTLY TO PREVENT DESTRUCTION OF UNIVERSE.";
} else {
	$getData= $mysqli->prepare("SELECT * FROM submissions WHERE name=?");
        $getData->bind_param('s', $name);
        if($getData->execute()){
            $results = $getData->get_result();
            if($results->num_rows>0){
                $name = (wordFilter($_POST["name"]))." ".generateRandomString();
                $userNameErr = "NAME ALREADY TAKEN, ALTERED SLIGHTLY TO PREVENT DESTRUCTION OF UNIVERSE.";
            } else {
            	$name = wordFilter($_POST["name"]);
            	$userNameErr = "";
            }
        }
}

//Sanitizes the name to make sure that there isn't any malicious code being inputted into the database
$nameForDB = $mysqli->real_escape_string($name);

//Adds the variables collected before into the database
$query = "INSERT INTO submissions (name, bread, meat, cheese, condiments, toppings, extras) VALUES ('{$nameForDB}', '{$bread}', '{$meat}', '{$cheese}', '{$condiments}', '{$toppings}', '{$extras}')";

//Creates a URL compatible name for the sandwiches review page, which can be later used in the Leaderboards page
//to look at the specific review page for the sandwich
$tablelName = htmlspecialchars($name);
$createTable="CREATE TABLE `{$tablelName}` LIKE reviews";

//Error message
if ($mysqli->connect_errno) {
	printf("Connect failed: %s/n", $mysqli->connect_error);
	exit();
}

//Submits the query into MySQL to process and actually do what was said in the "$query" and "$createTable" variables
$result = $mysqli->query($query);
$result2 = $mysqli->query($createTable);
$mysqli->close();

//Lists all the options that you submitted in the page before, and tells you any errors present.
echo "<h3>You submitted the following:<h3>";
echo "<h2>Name:</h2>";
echo '<b style="color:red">'.$userNameErr.'</b><br>';
echo $name. "<br />";
echo "<h2>Bread:</h2>";
echo $bread. "<br />";
echo "<h2>Meat:</h2>";
echo $meat. "<br />";
echo "<h2>Cheese:</h2>";
echo $cheese. "<br />";
echo "<h2>Condiments:</h2>";
echo $condiments. "<br />";
echo "<h2>Toppings:</h2>";
echo $toppings. "<br />";
echo "<h2>Extras:</h2>";
echo $extras. "<br /><br /><br />";
echo '<b>Successfully sent submission. </b>';
echo '<b>Click <a href="index.php">HERE</a> to return back to the designer page.</b><br>';
?>