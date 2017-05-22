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

<h3 style="color:black"> Sandwich Designer </h3>

<form action="submit.php" method="post">
<h3 style="color:red">Name:</h3> <input type="text" name="name"><br>
	
  <h3 style="color:orange">Bread</h3>
  <label>
    <input type="radio" class="radio" value="Dutch Crunch" name="bread[]" checked/>Dutch Crunch</label>
  <label>
    <input type="radio" class="radio" value="Sourdough Roll" name="bread[]" />Sourdough Roll</label>
  <label>
    <input type="radio" class="radio" value="Ciabatta Roll" name="bread[]" />Ciabatta Roll</label>
  <label>
    <input type="radio" class="radio" value="Sliced Wheat" name="bread[]" />Sliced Wheat</label>
  <label>
    <input type="radio" class="radio" value="Sliced Sourdough" name="bread[]" />Sliced Sourdough</label>
  <label>
    <input type="radio" class="radio" value="Gluten Free" name="bread[]" />Gluten Free</label>
	<hr>

 <h3 style="color:rgb(204,204,100)">Meat</h3>
  <label>
    <input type="radio" class="radio" value="Turkey" name="meat[]" />Turkey</label>
  <label>
    <input type="radio" class="radio" value="Roast Beef" name="meat[]" />Roast Beef</label>
  <label>
    <input type="radio" class="radio" value="Pastrami" name="meat[]" />Pastrami</label>
 <label>
    <input type="radio" class="radio" value="Salami" name="meat[]" />Salami</label>
 <label>
    <input type="radio" class="radio" value="Ham" name="meat[]" />Ham</label>
 <label>
    <input type="radio" class="radio" value="Tuna Salad" name="meat[]" />Tuna Salad</label>
 <label>
    <input type="radio" class="radio" value="Egg Salad" name="meat[]" />Egg Salad</label>
  <label>
    <input type="radio" class="radio" value="None" name="meat[]" checked/>None</label>
	<hr>

<h3 style="color:green">Cheese</h3>
 <label>
    <input type="radio" class="radio" value="Provolone" name="cheese[]" />Provolone</label>
<label>
    <input type="radio" class="radio" value="Swiss" name="cheese[]" />Swiss</label>
<label>
    <input type="radio" class="radio" value="Cheddar" name="cheese[]" />Cheddar</label>
<label>
    <input type="radio" class="radio" value="Fresh Mozzarella" name="cheese[]" />Fresh Mozzarella</label>
<label>
    <input type="radio" class="radio" value="None" name="cheese[]" checked/>None</label>
  <hr>

<h3 style="color:blue">Condiments</h3>
<label>
    <input type="radio" class="radio" value="Mayo" name="condiments[]" />Mayo</label>
<label>
    <input type="radio" class="radio" value="Mustard" name="condiments[]" />Mustard</label>
<label>
    <input type="radio" class="radio" value="Pesto" name="condiments[]" />Pesto</label>
<label>
    <input type="radio" class="radio" value="Veganaise" name="condiments[]" />Veganaise</label>
<label>
    <input type="radio" class="radio" value="Red Vin/Olive Oil" name="condiments[]" />Red Vin/Olive Oil</label>
<label>
    <input type="radio" class="radio" value="Balsalmic Oil/Olive Oil" name="condiments[]" />Balsalmic Vin/Olive Oil</label>
<label>
    <input type="radio" class="radio" value="None" name="condiments[]" checked/>None</label>
  <hr>
<h3 style="color:indigo">Toppings</h3>
<label>
    <input type="checkbox" class="radio" value="Roasted Red Peppers, " name="toppings[]" />Roasted Red Peppers</label>
<label>
    <input type="checkbox" class="radio" value="Pepperocini, " name="toppings[]" />Pepperocini</label>
<label>
    <input type="checkbox" class="radio" value="Pickles, " name="toppings[]" />Pickles</label>
<label>
    <input type="checkbox" class="radio" value="Basil, " name="toppings[]" />Basil</label>
<label>
    <input type="checkbox" class="radio" value="Lettuce, " name="toppings[]" />Lettuce</label>
<label>
    <input type="checkbox" class="radio" value="Tomatoes, " name="toppings[]" />Tomatoes</label>
<label>
    <input type="checkbox" class="radio" value="Hummus, " name="toppings[]" />Hummus</label>
<label>
    <input type="checkbox" class="radio" value="Red Onions, " name="toppings[]" />Red Onions</label>
<label>
    <input type="checkbox" class="radio" value="Jalapenos, " name="toppings[]" />Jalapenos</label>
<label>
    <input type="checkbox" class="radio" value="Artichoke Hearts, " name="toppings[]" />Artichoke Hearts</label>
<label>
    <input type="checkbox" class="radio" value="None" name="toppings[]" checked/>None</label>
  <hr>
<h3 style="color:violet">Extras</h3>
<label>
    <input type="checkbox" class="radio" value="Avocado, " name="extras[]" />Avocado</label>
<label>
    <input type="checkbox" class="radio" value="Bacon, " name="extras[]" />Bacon</label>
<label>
    <input type="checkbox" class="radio" value="None" name="extras[]" checked/>None</label><br>
  <hr>
<button type="button">Print</button> 
<input type="submit" value="submit">
<form>
</body>

</html>