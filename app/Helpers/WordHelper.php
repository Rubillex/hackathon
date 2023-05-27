<?php

namespace App\Helpers;

class WordHelper
{
    public static function getWordForm(int $count, array $forms = []): string
    {
        $n100 = $count % 100;
        $n10 = $count % 10;

        if (($n100 > 10) && ($n100 < 21)) {
            return $forms[2];
        } elseif ((!$n10) || ($n10 >= 5)) {
            return $forms[2];
        } elseif ($n10 == 1) {
            return $forms[0];
        }

        return $forms[1];
    }
}
