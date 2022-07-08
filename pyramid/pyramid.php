<?php
/*

    *
   ***
  *****
 *******
*********

Write a script to output this pyramid on console (with leading spaces)

*/

function getStarCountByLevel(int $level): int
{
    return $level * 2 - 1;
}

function draw(int $starCount, int $starCountMax): void
{
    echo str_repeat(' ', (int)floor(($starCountMax - $starCount) / 2)),
    str_repeat('*', $starCount),
    PHP_EOL;
}

function pyramid(int $height): void
{
    if ($height < 1) {
        throw new Exception('Invalid pyramid height');
    }

    $starCountMax = getStarCountByLevel($height);
    for ($level = 1; $level <= $height; $level++) {
        $starCount = getStarCountByLevel($level);
        draw($starCount, $starCountMax);
    }
}

pyramid(5);
