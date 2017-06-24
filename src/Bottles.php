<?php

namespace Bottles;

class Bottles
{
    public function song() : string
    {
        return $this->verses(99, 0);
    }

    public function verses(int $bottlesAtStart, int $bottlesAtEnd) : string
    {
        $bottle = $this;

        return join("\n\n", array_map(function($bottles) use ($bottle) {
            return $bottle->verse($bottles);
        }, range($bottlesAtStart, $bottlesAtEnd)));
    }

    public function verse($bottles) : string
    {
        return new Round($bottles);
    }
}
