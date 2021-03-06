<?php
    class Car
    {
        private $name;
        private $cost;
        private $odometer;
        private $photo;

        function __construct($make_model, $miles, $price, $car_pic)
        {
            $this->name = $make_model;
            $this->odometer = $miles;
            $this->cost = $price;
            $this->photo = $car_pic;
        }

        function setMake($new_make)
        {
            $this->name = $new_make;
        }
        function setCost($new_price)
        {
            $float_price = (float) $new_price;
            if ($float_price != 0) {
                $formatted_price = number_format($float_price, 2);
                $this->cost = $formatted_price;
            }
        }
        function setMiles($new_miles)
        {
            $this->odometer = $new_miles;
        }

        function getMake()
        {
            return $this->name;
        }
        function getCost()
        {
            return $this->cost;
        }
        function getMiles()
        {
            return $this->odometer;
        }
        function getPhoto()
        {
            return $this->photo;
        }

    }

    $first_car = new Car("2014 Porsche 911", 7864, 114991, "img/porsche.jpg");
    $second_car = new Car("2011 Ford F450", 14241, 55995, "img/ford.jpg");
    $third_car = new Car("2013 Lexus RX 350", 20000, 44700, "img/lexus.jpg");
    $fourth_car = new Car("Mercedes Benz CLS550", 37979, 38392, "img/mercedes.jpg");
    $fourth_car->setCost("706.345897");

    // $porsche = new Car();
    // $porsche->make_model = "2014 Porsche 911";
    // $porsche->price = 114991;
    // $porsche->miles = 7864;
    //
    // $ford = new Car();
    // $ford->make_model = "2011 Ford F450";
    // $ford->price = 55995;
    // $ford->miles = 14241;
    //
    // $lexus = new Car();
    // $lexus->make_model = "2013 Lexus RX 350";
    // $lexus->price = 44700;
    // $lexus->miles = 20000;
    //
    // $mercedes = new Car();
    // $mercedes->make_model = "Mercedes Benz CLS550";
    // $mercedes->price = 39900;
    // $mercedes->miles = 37979;

    $cars = array($first_car, $second_car, $third_car, $fourth_car);

    $cars_matching_search = array();
    foreach ($cars as $car) {
        $cost_data = $car->getCost();
        $miles_data = $car->getMiles();
        if ($car->getCost() <= $_GET["search_price"] && $car->getMiles() <= $_GET["search_miles"]) {
            array_push($cars_matching_search, $car);
        }
    }


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <title>Your Cars</title>
</head>
<body>
    <div class="container">
        <h1>Jordan and Kyle's Janky Car Emporium</h1>
        <ul>
            <?php
                if (empty($cars_matching_search)) {
                    echo "<h2>No cars match your search, cheapskate!</h2>";

                } else {
                    foreach ($cars_matching_search as $car) {
                        $car_price = $car->getCost();
                        $car_make = $car->getMake();
                        $car_miles = $car->getMiles();
                        $car_photo = $car->getPhoto();
                        echo "<div class='row'>
                            <div class='col-md-6'>
                                <img src='$car_photo' alt='Photo of $car_make'>
                            </div>
                            <div class='col-md-6'>
                                <p>$car_make</p>
                                <p>Miles: $car_miles</p>
                                <p>Price: $$car_price</p>
                            </div>
                        </div>
                        ";
                    }
                }

                // foreach ($cars as $car) {
                //     echo "<li> $car->name </li>";
                //     echo "<ul>";
                //         echo "<li> $$car->cost </li>";
                //         echo "<li> Miles: $car->odometer </li>";
                //     echo "</ul>";
                // }
            ?>
        </ul>
    </div>
</body>
</html>
