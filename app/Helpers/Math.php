<?php

namespace App\Helpers;

class Math
{
    public static function getPercent($total, $current): float|int
    {
        if ($total === 0 || $current === 0) {
            $percent = 0;
        } elseif ($total === $current) {
            $percent = 100;
        } else {
            $percent = round($current / $total * 100, 2);
        }
        return $percent;
    }
}
