<?php

namespace Bottles;

class Bottles
{
    public function song() : string
    {
        return $this->verses(99, 0);
    }

    public function verses(int $starting, int $ending) : string
    {
        $bottle = $this;

        return join("\n\n", array_map(function($i) use ($bottle) {
            return $bottle->verse($i);
        }, range($starting, $ending)));
    }

    public function verse($number) : string
    {
        $verses = [
            0 => "No more bottles of beer on the wall, no more bottles of beer.
Go to the store and buy some more, 99 bottles of beer on the wall.",
            1 => "1 bottle of beer on the wall, 1 bottle of beer.
Take it down and pass it around, no more bottles of beer on the wall.",
            2 => "2 bottles of beer on the wall, 2 bottles of beer.
Take one down and pass it around, 1 bottle of beer on the wall.",
        ];

        return $verses[$number] ?? sprintf('%1$d bottles of beer on the wall, %1$d bottles of beer.
Take one down and pass it around, %2$d bottles of beer on the wall.', $number, $number - 1);
    }
}