<?php

class Car
{
    public $make_model;
    public $price;
    private $miles;

    function __construct($name, $cost, $mileage)
    {
        $this->make_model = $name;
        $this->price = $cost;
        $this->miles = $mileage;
    }

    function setMiles($new_miles)
    {
        $float_miles = (float) $new_miles;
        if ($float_miles != 0) {
            $this->miles = $float_miles;
        }
    }
    function getMiles()
    {
            return $this->miles;
    }
}

$porsche = new Car("2014 Porsche 911", 114991, 7804);

$ford = new Car("2011 Ford F450", 55995, 14241);

$lexus = new Car("2013 Lexus RX 350", 78000, 23000);

$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->price < $_GET["price"]) {
        array_push($cars_matching_search, $car);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
        <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
            <?php
                foreach ($cars_matching_search as $car) {
                    $car_miles = $car->getMiles();
                    echo "<li> $car->make_model </li>";
                    echo "<ul>";
                        echo "<li> $$car->price </li>";
                        echo "<li> Miles: $car_miles </li>";
                    echo "</ul>";
                }
            ?>
    </ul>
</body>
</html>
