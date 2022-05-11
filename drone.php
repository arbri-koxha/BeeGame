<?php


class Drone extends Bee
{

    public function __construct()
    {
        $this->hitpoints = 12;
        $this->lifespan = 50;
        $this->type = "drone";
    }

    public function hit()
    {
        $this->lifespan = $this->lifespan - $this->hitpoints;
    }
}
