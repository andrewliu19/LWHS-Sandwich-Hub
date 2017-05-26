<?php

function array_random($arr, $num) {
	shuffle($arr);
	$r = array();
	for($i = 0; $i < $num; $i++) {
	$r[] = $arr[$i];
	}
	return $num == 1 ? $r[0] : $r;
}

print("<h3>Bread:</h3>");
$a = array("Dutch Crunch, <br>", "Sourdough Roll, <br>", "Ciabatta Roll, <br>", "Sliced Wheat, <br>", "Sliced Sourdough, <br>", "Gluten Free, <br>");
print(array_random($a,1));

print("<h3>Meat:</h3>");
$b = array("Turkey, <br>", "Roast Beef, <br>", "Pastrami, <br>", "Salami, <br>", "Ham, <br>", "Tuna Salad, <br>", "Egg Salad, <br>", "None, <br>");
print(array_random($b,1));

print("<h3>Cheese:</h3>");
$c = array("Provolone, <br>", "Swiss, <br>", "Cheddar, <br>", "Fresh Mozzarella, <br>", "None, <br>");
print(array_random($c,1));

print("<h3>Condiments:</h3>");
$d = array("Mayo, <br>",  "Mustard, <br>", "Pesto, <br>",  "Veganaise, <br>",  "Red Vin/Olive Oil, <br>",  "Balsalmic Vin/Olive Oil, <br>",  "None, <br>");
print(array_random($d,1));

print("<h3>Toppings:</h3>");
$e = array("Roasted Red Peppers, ", "Pepperocini, ",  "Pickles, ",  "Basil, ",  "Lettuce, ",  "Tomatoes, ",  "Hummus, ",  "Red Onions, ",  "Jalapenos, ",  "Artichoke Hearts ");
print(implode(array_random($e, rand(1,7)))."<br>");

print("<h3>Extras:</h3>");
$f = array("Avocado ", "Bacon ","None ");
print(array_random($f,1)."<br><br>");
echo '<b>Click <a href="index.php">HERE</a> to return back to the designer page.</b><br>';
?>