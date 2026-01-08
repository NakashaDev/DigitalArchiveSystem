<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GenreHasItem extends Model
{
    use SoftDeletes;

    protected $table = 'genre_has_items';

    protected $primaryKey = ['collection_genre_id', 'collection_item_id'];
    public $incrementing = false;
}
