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

<h3> Sandwich Randomizer </h3>

<form action="random.php" method="post">
<h3> Specifications </h3>
<label>
    <input type="checkbox" class="checkbox" value="Vegetarian" name="Vegetarian" />Vegetarian</label>
<label>
    <input type="checkbox" class="checkbox" value="Gluten-Free" name="Gluten-Free" />Gluten-Free</label>
 


<button type="button">Randomize</button> 
<input type="random" value="random">

<form>
</body>

</html>