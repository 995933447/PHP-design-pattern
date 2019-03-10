<?php 
interface Vehicle
{
    public function getDeclare();
}

class Car implements Vehicle
{
    public function getDeclare()
    {
        print __CLASS__;
    }
}

class Bike implements Vehicle
{
    public function getDeclare()
    {
        print __CLASS__;
    }
}

abstract class BridgeInterface
{
    private $vihecle;

    public function __construct(Vihecle $vihecle)
    {
        $this->vihecle = $vihecle;
    }

    public function changeVehicle(Vihecle $vihecle)
    {
        $this->vihecle = $vihecle;
    }

    abstract public function getDeclare();
}

class FloorBridge extends BridgeInterface
{
    private $vihecle;

    public function __construct(Vihecle $vihecle)
    {
        $this->vihecle = $vihecle;
    }

    public function changeVehicle(Vihecle $vihecle)
    {
        $this->vihecle = $vihecle;
    }

    public function getDeclare()
    {
        return $this->vehicle->getDeclare();
    }
}