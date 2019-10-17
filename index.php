<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php 
    if(date("a") == "am"){
        echo "<link 	rel='stylesheet' href='day.css' />";
         } else {
             echo "<link rel='stylesheet' href='night.css' />";
         }
    ?>
</head>
<body>

<?php  
$date_val = date("F j o");

if(date("a") == "am"){
    echo "<h1>Good morning! It is $date_val</h1>";
} else {
    echo "<h1>Good evening! It is $date_val</h1>";
}
?>

<?php  
//load this externally.....
function calculatePi($radius, $round_val = 2) {
    if(!is_numeric($radius) || !is_numeric($round_val) || $radius <= 0 || $round_val <= 0){
     echo "Please pass a valid integer";
     return;
    } 
  
    $r_square = pow($radius, 2);
    $pi_cal = 3.14 *  $r_square;
    return round($pi_cal, $round_val);
  }

echo calculatePi(2);
echo calculatePi(2, 1);
echo calculatePi(2, 0);
echo calculatePi("2");
echo calculatePi(2, "1");
echo calculatePi(-2);
echo calculatePi(0);
echo calculatePi(1, -1);
?>

<?php 
$m1 = array("name"=>"Billy Corgan", "genre"=>"Rock", "role"=>"Guitars/Vocals");
$m2 = array("name"=>"Richard James D.", "genre"=>"Electronic", "role"=>"Instrumentation");
$m3 = array("name"=>"Jimmi Hendrix", "genre"=>"Rock", "role"=>"Lead Guitar/Vocals");

$musician_array = array($m1, $m2, $m3);

function printArr ($arr) {
    echo ""    echo ""
    foreach ($arr as $key => $value) {
        echo("<li> $key: $value </li>");
    }
    }
?>

<ul>
<?php printArr($m1); ?> 
</ul>

<ul>
<?php printArr($m2); ?>
</ul>

<ul>
<?php printArr($m3); ?>
</ul>

<ul>
<?php
foreach ($musician_array as $value) {
    foreach ($value as  $key => $sub_value) {
    echo("<li> $key: $sub_value </li>");
  }
}
?>
</ul>


<ul>
<?php 
$day = (int)date("j");

$month = date("F");

 for ($day; $day >= 0; $day--) {
    echo("<li> $month  $day </li>");
 }
?> 
</ul>

</body>
</html>
