<?php

namespace Bottles;

class Verse
{
    protected $number;
    protected $lyrics;

    public function __construct(int $number, \Closure $lyrics)
    {
        $this->number = $number;
        $this->lyrics = $lyrics;
    }

    public function __toString() : string
    {
        return $this->lyrics->call($this);
    }
}
