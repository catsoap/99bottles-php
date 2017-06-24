<?php

namespace Bottles;

class Round
{
    private $bottles;

    public function __construct(int $bottles)
    {
        $this->bottles = $bottles;
    }

    public function __toString() : string
    {
        return $this->challenge() . $this->response();
    }

    private function challenge() : string
    {
        return ucfirst($this->bottlesOfBeer()) . ' ' . $this->onWall() . ', ' . $this->bottlesOfBeer() . ".\n";
    }

    private function response() : string
    {
        return $this->goToTheStoreOrTakeOneDown() . ', ' .$this->bottlesOfBeer() . ' ' . $this->onWall() . '.';
    }

    private function bottlesOfBeer() : string
    {
        return $this->anglicizedBottleCount() . ' ' . $this->pluralizedBottleForm() . ' of ' . $this->beer();
    }

    private function beer() : string
    {
        return 'beer';
    }

    private function onWall() : string
    {
        return 'on the wall';
    }

    private function pluralizedBottleForm() : string
    {
        return $this->lastBeer() ? 'bottle' : 'bottles';
    }

    private function anglicizedBottleCount() : string
    {
        return $this->allOut() ? 'no more' : $this->bottles;
    }

    private function goToTheStoreOrTakeOneDown() : string
    {
        if ($this->allOut()) {
            $this->bottles = 99;

            return $this->buyNewBeer();
        } else {
            $lyrics = $this->drinkBeer();
            $this->bottles -= 1;

            return $lyrics;
        }
    }

    private function buyNewBeer() : string
    {
        return 'Go to the store and buy some more';
    }

    private function drinkBeer() : string
    {
        return 'Take ' . $this->itOrNone() . ' down and pass it around';
    }

    private function itOrNone() : string
    {
        return $this->lastBeer() ? 'it' : 'one';
    }

    private function allOut() : bool
    {
        return $this->bottles === 0;
    }

    private function lastBeer() : bool
    {
        return $this->bottles === 1;
    }
}