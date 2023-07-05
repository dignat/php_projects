<?php

interface Reptile
{
    public function layEgg(): ReptileEgg;
}

class FireDragon
{
  
}

class ReptileEgg
{
    public function __construct(string $reptileType)
    {
      
    }

    public function hatch(): Reptile
    {
        throw new Exception("Not implemented");
    }
}