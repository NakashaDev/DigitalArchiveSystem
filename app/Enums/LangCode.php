<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class LangCode extends Enum implements LocalizedEnum
{
    const JAPANESE = 1;
    const ENGLISH = 2;
    const CHINESE = 3;
    const KOREAN = 5;

    public static array $translations = [
        LangCode::JAPANESE => '日本語',
        LangCode::ENGLISH => '英語',
        LangCode::CHINESE => '中国語',
        LangCode::KOREAN => '韓国語',
    ];
}
