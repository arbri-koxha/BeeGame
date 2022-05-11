<?php

class Queen extends Bee
{

    public function __construct()
    {
        $this->hitpoints = 80;
        $this->lifespan = 100;
        $this->type = "queen";
    }

    public function hit()
    {
        $this->lifespan = $this->lifespan - $this->hitpoints;
    }
}
