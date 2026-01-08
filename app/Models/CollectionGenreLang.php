<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollectionGenreLang extends Model
{
    use SoftDeletes;

    protected $table = 'collection_genre_lang';

    protected $primaryKey = ['collection_genre_id', 'lang_code'];
    public $incrementing = false;
}
