<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollectionItem extends Model
{
    use SoftDeletes;

    protected $table = 'collection_items';

    protected $primaryKey = 'collection_item_id';

}
