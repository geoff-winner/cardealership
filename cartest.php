<?php

class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $image_path;

    function __construct($name, $cost, $mileage, $image)
    {
        $this->make_model = $name;
        $this->price = $cost;
        $this->miles = $mileage;
        $this->image_path = $image;
    }

    function getMakeModel()
    {
        return $this->make_model;
    }
    function getPrice()
    {
        return $this->price;
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
    function getImage()
    {
        return $this->image_path;
    }
}

$porsche = new Car("2014 Porsche 911", 114991, 7804, "porsche911.jpg");

$ford = new Car("2011 Ford F450", 55995, 14241, "f450.jpg");

$lexus = new Car("2013 Lexus RX 350", 39900, 23000, "lexusrx350.jpg");

$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979,"cls550.jpg");

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    $car_price = $car->getPrice();
    $car_miles = $car->getMiles();
    if ($car_price < $_GET["price"] || $car_miles < $_GET["miles"])
    {
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
                if (empty ($cars_matching_search)){
                    echo "There are no results to display.";
                }   else {

                    foreach ($cars_matching_search as $car)
                    {
                    $car_price = $car->getPrice();
                    $car_make_model = $car->getMakeModel();
                    $car_miles = $car->getMiles();
                    $car_image = $car->getImage();
                    echo "<li> $car_make_model </li>";
                    echo "<img src='$car_image'>";
                    echo "<ul>";
                        echo "<li> $$car_price </li>";
                        echo "<li> Miles: $car_miles </li>";
                    echo "</ul>";
                    }
                }
            ?>
    </ul>
</body>
</html>
