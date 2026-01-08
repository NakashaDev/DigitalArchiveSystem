<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollectionItemLang extends Model
{
    use SoftDeletes;

    protected $table = 'collection_item_lang';

    protected $primaryKey = ['item_id', 'lang_code'];
    public $incrementing = false;
}
