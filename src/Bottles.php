<?php

namespace Bottles;

class Bottles
{
    public function verse($number)
    {
        $verse = (($number > 0)
            ? sprintf(
                '%1$s of beer on the wall, %1$s of beer.',
                ($number > 1 ) ? sprintf('%s bottles', $number) : '1 bottle'
            ) : 'No more bottles of beer on the wall, no more bottles of beer.'
        ) . "\n";

        $verse .= ($number >0)
        ? sprintf(
            'Take %s down and pass it around, %s of beer on the wall.',
            ($number > 1 ) ? 'one' : 'it',
            ($number > 2 ) ? sprintf('%s bottles', $number - 1 ) : (($number) === 2 ? '1 bottle' : 'no more bottles')
        )
        : 'Go to the store and buy some more, 99 bottles of beer on the wall.';

        return $verse;
    }

    public function verses($first, $last)
    {
        $bottles = $this;
        $verses = join("\n\n", array_map(
            function($number) use ($bottles) { return $bottles->verse($number); },
            range($first, $last))
        );

        return $verses;
    }

    public function song()
    {
        return $this->verses(99, 0);
    }
}