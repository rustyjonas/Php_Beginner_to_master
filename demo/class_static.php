<?php


class Car {

    static $wheels = 4;
    var $hood = 1;
    var $engine = 1;
    var $doors = 4;

    function MoveWheels(){

        Car::$wheels = 10;

    }

    function CreateDoors(){

        $this->doors = 6;

    }

}


$bmw = new Car();

Car::MoveWheels();

echo Car::$wheels;