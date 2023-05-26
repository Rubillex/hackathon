<?php

namespace App\Enum;

class QuestionTypeEnum
{
    const RADIO = 1;
    const CHECKBOX = 2;
    const TEXT = 3;

    const TYPES = [self::RADIO, self::CHECKBOX, self::TEXT];
}
