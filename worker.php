<?php

class Worker extends Bee
{

    public function __construct()
    {
        $this->hitpoints = 10;
        $this->lifespan = 75;
        $this->type = "worker";
    }

    public function hit()
    {
        $this->lifespan = $this->lifespan - $this->hitpoints;
    }
}
