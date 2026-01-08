<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class UserGroup extends Enum implements LocalizedEnum
{
    const SUPER_ADMIN = 'super-admin';
    const DATA_EDITOR = 'data-editor';

    public static array $translations = [
        UserGroup::SUPER_ADMIN => 'システム管理者',
        UserGroup::DATA_EDITOR => '登録者',
    ];
}
