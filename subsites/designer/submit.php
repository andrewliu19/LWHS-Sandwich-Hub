<?php
function wordFilter($text)
{
    $filter_terms = array('/\bass(e?)?\b/i', '/shit(e|t?)?/i', '/fuck/i', '/slut/i', '/bitch(e?)?/i', '/penis(e?)?/i', '/vagina/i', '/dick/i');
    $filtered_text = preg_replace($filter_terms, 'Peter', $text);
    return $filtered_text;
}

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

$bread = implode($_POST["bread"]);
$meat = implode($_POST["meat"]);
$cheese = implode($_POST["cheese"]);
$condiments = implode($_POST["condiments"]);
if (preg_match('/None/',(implode($_POST["toppings"])))){
	$toppings = "None";
} else {
	$toppings = implode($_POST["toppings"]);
}
if (preg_match('/None/',(implode($_POST["extras"])))){
	$extras = "None";
} else {
	$extras = implode($_POST["extras"]);
}
$db_user = 'root';
$db_pass = '';
$db_name = 'sandwich';
$db_host = 'localhost';

// $db_user = 'isaacjakeandrew';
// $db_pass = 'computing2!';
// $db_name = 'sandwich_c2';
// $db_host = 'mysql.makerstickers.com';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

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

$nameForDB = $mysqli->real_escape_string($name);

$query = "INSERT INTO submissions (name, bread, meat, cheese, condiments, toppings, extras) VALUES ('{$nameForDB}', '{$bread}', '{$meat}', '{$cheese}', '{$condiments}', '{$toppings}', '{$extras}')";

$tablelName = htmlspecialchars($name);

$createTable="CREATE TABLE `{$tablelName}` LIKE reviews";


if ($mysqli->connect_errno) {
	printf("Connect failed: %s/n", $mysqli->connect_error);
	exit();
}

$result = $mysqli->query($query);
$result2 = $mysqli->query($createTable);
// $result3 = $mysqli->query($userNameErr);

$mysqli->close();


// if (strlen($_POST["name"])<1) {
// 	$name = "Unnamed Sandwich ".generateRandomString();
// } else {
// 	$name = wordFilter($_POST["name"]);
// }

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