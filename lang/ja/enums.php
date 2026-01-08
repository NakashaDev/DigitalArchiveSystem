<?php

use App\Enums\ItemType;
use App\Enums\LangCode;
use App\Enums\UserGroup;

return [
    ItemType::class => ItemType::$translations,
    LangCode::class => LangCode::$translations,
    UserGroup::class => UserGroup::$translations,
];
