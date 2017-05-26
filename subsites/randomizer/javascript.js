
function myFunction() {
 bread()
 meat()
 cheese()
 condiments()
 toppings()
 extras()
}

function bread (){
var 1= Dutch Crunch
var 2= Sourdough Roll
var 3= Ciabatta Roll
var 4= Sliced Wheat
var 5= SLiced Sourdough
var 6= Gluten Free
   var bread =  Math.floor(Math.random() * 6)+1;

   return var bread;
 }

function meat (){
	var 1= Turkey
	var 2= Roast Beef
	var 3= Pastrami
	var 4= Salami
	var 5= Ham
	var 6= Tuna Salad
	var 7= Egg Salad
	var 8= None
	var meat = Math.floor(Math.random()*8)+1;
	return var meat
}
function cheese (){
	var 1=Provolone
	var 2=Swiss
	var 3=Cheddar
	var 4=Fresh Mozzarella
	var 5= None
	var cheese = Math.floor(Math.random()*5)+1;
	return var cheese
}
function condiments(){
	var 1= Mayo
	var 2= Mustard
	var 3= Pesto
	var 4= Veganaise
	var 5= Red Vin Olive Oil
	var 6= Balsalmic Vin Olive Oil
	var 7= None
	var condiments = Math.floor(Math.random()*7)+1;
	return var condiments
}
function toppings (){
	var 1= Roasted Red Peppers
	var 2= Pepperocini
	var 3= Pickles
	var 4= Basil
	var 5 =Lettuce
	var 6= Tomatoes
	var 7= Hummus
	var 8= Red Onions
	var 9= Jalapenos
	var 10= Artichoke Hearts
	var 11= None
	var toppings= Math.floor(Math.random()*11)+1;
	return var toppings
}
function extras (){
	var 1= Avocado
	var 2= Bacon
	var 3= None
	var extras= Math.floor(Math.random()*3)+1;
	return var extras
}