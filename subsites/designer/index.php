<!DOCTYPE html>
<html>

<head>
<title> LWHS Sandwich Hub </title>
<link rel="stylesheet" type="text/css" href="../../main.css"/>
<script src="javascript.js"></script>
</head>

<body>
<img src="../../images/sandwich.png" alt="Sandwich" height="50" width="90">


<h1> Sandwich Hub </h1>
<div style="z-index: -1;position: absolute;top:0px;left:-30px;width:100%;height:130px; background-color: black;"></div>

<ul>
  <li><a href="../../index.php">Home</a></li>
  <li><a class="active" href="index.php">Design a Sandwich!</a></li>
  <li><a href="../randomizer/index.php">Randomize a Sandwich!</a></li>
  <li><a href="../leaderboards/index.php">Leaderboards</a></li>
</ul>

<p> Sandwich Designer </p>

<form action="submit.php" method="get">

	
  <h3>Bread</h3>
  <label>
    <input type="radio" class="radio" value="dutchCrunch" name="bread[]" />Dutch Crunch</label>
  <label>
    <input type="radio" class="radio" value="sourdoughRoll" name="bread[]" />Sourdough Roll</label>
  <label>
    <input type="radio" class="radio" value="ciabattaRoll" name="bread[]" />Ciabatta Roll</label>
  <label>
    <input type="radio" class="radio" value="slicedWheat" name="bread[]" />Sliced Wheat</label>
  <label>
    <input type="radio" class="radio" value="slicedSourdough" name="bread[]" />Sliced Sourdough</label>
  <label>
    <input type="radio" class="radio" value="glutenFree" name="bread[]" />Gluten Free</label>
	

 <h3>Meat</h3>
  <label>
    <input type="radio" class="radio" value="turkey" name="meat[]" />Turkey</label>
  <label>
    <input type="radio" class="radio" value="roastBeef" name="meat[]" />Roast Beef</label>
  <label>
    <input type="radio" class="radio" value="pastrami" name="meat[]" />Pastrami</label>
 <label>
    <input type="radio" class="radio" value="salami" name="meat[]" />Salami</label>
 <label>
    <input type="radio" class="radio" value="ham" name="meat[]" />Ham</label>
 <label>
    <input type="radio" class="radio" value="tunaSalad name="meat[]" />Tuna Salad</label>
 <label>
    <input type="radio" class="radio" value="eggSalad" name="meat[]" />Egg Salad</label>
	
<h3>Cheese</h3>
 <label>
    <input type="radio" class="radio" value="provolone" name="cheese[]" />Provolone</label>
<label>
    <input type="radio" class="radio" value="swiss" name="cheese[]" />Swiss</label>
<label>
    <input type="radio" class="radio" value="cheddar" name="cheese[]" />Cheddar</label>
<label>
    <input type="radio" class="radio" value="freshMozzarella" name="cheese[]" />Fresh Mozzarella</label>
<h3>Condiments</h3>
<label>
    <input type="radio" class="radio" value="mayo" name="condiments[]" />Mayo</label>
<label>
    <input type="radio" class="radio" value="mustard" name="condiments[]" />Mustard</label>
<label>
    <input type="radio" class="radio" value="pesto" name="condiments[]" />Pesto</label>
<label>
    <input type="radio" class="radio" value="veganaise" name="condiments[]" />Veganaise</label>
<label>
    <input type="radio" class="radio" value="redVinOliveOil" name="condiments[]" />Red Vin/Olive Oil</label>
<label>
    <input type="radio" class="radio" value="balsalmicOilOliveOil" name="condiments[]" />Balsalmic Vin/Olive Oil</label>
<h3>Toppings</h3>
<label>
    <input type="checkbox" class="radio" value="roastedRedPeppers" name="toppings[]" />Roasted Red Peppers</label>
<label>
    <input type="checkbox" class="radio" value="pepperocini" name="toppings[]" />Pepperocini</label>
<label>
    <input type="checkbox" class="radio" value="pickles" name="toppings[]" />Pickles</label>
<label>
    <input type="checkbox" class="radio" value="basil" name="toppings[]" />Basil</label>
<label>
    <input type="checkbox" class="radio" value="lettuce" name="toppings[]" />Lettuce</label>
<label>
    <input type="checkbox" class="radio" value="tomatoes" name="toppings[]" />Tomatoes</label>
<label>
    <input type="checkbox" class="radio" value="hummus" name="toppings[]" />Hummus</label>
<label>
    <input type="checkbox" class="radio" value="redonions" name="toppings[]" />Red Onions</label>
<label>
    <input type="checkbox" class="radio" value="jalapenos" name="toppings[]" />Jalapenos</label>
<label>
    <input type="checkbox" class="radio" value="artichokeHearts" name="toppings[]" />Artichoke Hearts</label>
<h3>Extras</h3>
<label>
    <input type="checkbox" class="radio" value="avocado" name="extras[]" />Avocado</label>
<label>
    <input type="checkbox" class="radio" value="bacon" name="extras[]" />Bacon</label>
<button type="button">Print</button> 
<input type="submit" value="submit">
<form>
</body>

</html>