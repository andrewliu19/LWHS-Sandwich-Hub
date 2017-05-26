<?php

function array_random($arr, $num = 1) {
    shuffle($arr);
    
    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

$a = array("Dutch Crunch", "Sourdough Roll", "Ciabatta Roll", "Sliced Wheat", "Sliced Sourdough",   "Gluten Free");
print_r(array_random($a));
print_r(array_random($a, 2));

function array_random($arr, $num = 1) {
    shuffle($arr);
    
    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

$a = array("Turkey", "Roast Beef", "Pastrami", "Salami", "Ham", "Tuna Salad", "Egg Salad", "None");
print_r(array_random($a));
print_r(array_random($a, 2));

function array_random($arr, $num = 1) {
    shuffle($arr);
    
    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

$a = array("Provolone", "Swiss", "Cheddar", "Fresh Mozzarella", "None");
print_r(array_random($a));
print_r(array_random($a, 2));

function array_random($arr, $num = 1) {
    shuffle($arr);
    
    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

$a = array("Mayo",  "Mustard", "Pesto",  "Veganaise",  "Red Vin/Olive Oil",  "Balsalmic Vin/Olive Oil",  "None");
print_r(array_random($a));
print_r(array_random($a, 2));


function array_random($arr, $num = 1) {
    shuffle($arr);
    
    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

$a = array("Roasted Red Peppers", "Pepperocini",  "Pickles",  "Basil",  "Lettuce",  "Tomatoes",  "Hummus",  "Red Onions",  "Jalapenos",  "Artichoke Hearts",  "None");
print_r(array_random($a));
print_r(array_random($a, 2));

function array_random($arr, $num = 1) {
    shuffle($arr);
    
    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

$a = array("Avocado", "Bacon", "None");
print_r(array_random($a));
print_r(array_random($a, 2));
?>