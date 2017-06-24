<?php

namespace Bottles;

class Bottles
{
    protected $lyrics;

    public function __construct()
    {
        $this->lyrics = [
            'noMore' => function () {
                return <<<VERSE
No more bottles of beer on the wall, no more bottles of beer.
Go to the store and buy some more, 99 bottles of beer on the wall.
VERSE;
            },

            'lastOne' => function () {
                return<<<VERSE
1 bottle of beer on the wall, 1 bottle of beer.
Take it down and pass it around, no more bottles of beer on the wall.
VERSE;
            },

            'penultimate' => function () {
                return<<<VERSE
2 bottles of beer on the wall, 2 bottles of beer.
Take one down and pass it around, 1 bottle of beer on the wall.
VERSE;
            },

            'default' => function () {
                $decrNumber = $this->number - 1;

                return<<<VERSE
$this->number bottles of beer on the wall, $this->number bottles of beer.
Take one down and pass it around, $decrNumber bottles of beer on the wall.
VERSE;
            },
        ];
    }

    public function song() : string
    {
        return $this->verses(99, 0);
    }

    public function verses(int $finish, int $start) : string
    {
        return join("\n\n", array_map(function ($verseNumber) {
            return $this->verse($verseNumber);
        },
            range($finish, $start)
        ));
    }

    public function verse(int $number) : string
    {
        return $this->verseFor($number);
    }

    protected function verseFor(int $number) : string
    {
        $verses = [
            0 => new Verse($number, $this->lyrics['noMore']),
            1 => new Verse($number, $this->lyrics['lastOne']),
            2 => new Verse($number, $this->lyrics['penultimate'])
        ];

        return $verses[$number] ?? new Verse($number, $this->lyrics['default']);
    }
}
