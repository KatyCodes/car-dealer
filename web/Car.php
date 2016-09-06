<?php
    class Car
    {
      public $make_model;
      public $price;
      private $miles;
      public $image;

      function __construct($car_model, $car_price, $car_miles, $car_image=null)
      {
        $this->make_model = $car_model;
        $this->price = $car_price;
        $this->miles = $car_miles;
        $this->image = $car_image;
      }

      function worthBuying($max_price, $max_miles)
      {
        if ($this->price < $max_price && $this->miles < $max_miles){
            return $this;
        }
      }
      function getMiles()
      {
          return $this->miles;
      }
      function setMiles($numberOfMiles)
      {
          $this->miles = $numberOfMiles;
      }
    }

    $porsche = new Car("2014 Porsche 911", 114991, 7864, "../img/porsche.jpg");
    $ford = new Car("2011 Ford F450", 55995, 14241);
    $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
    $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);

    $cars = array($porsche, $ford, $lexus, $mercedes);

    $car_matching_search = array();
    foreach ($cars as $car) {
        if ($car->worthBuying($_GET['price'], $_GET['miles'])) {
            array_push($car_matching_search, $car);
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
            if (empty($car_matching_search)) {
              echo "Your car search did not return any results. Get more money!";
            }
            else {
                foreach ($car_matching_search as $car) {
                  $showMiles = $car->getMiles();
                  echo "<li> $car->make_model </li>";
                  echo "<ul>";
                      echo "<li> $$car->price </li>";
                      echo "<li> Miles: $showMiles </li>";
                      echo "<img src='$car->image'>";
                  echo "</ul>";
                }
              }
        ?>
      </ul>

  </body>
</html>
