<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenreHasItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_has_items', function (Blueprint $table) {
            $table->integer('collection_genre_id')->comment('項目ID');
            $table->integer('collection_item_id')->comment('項目ID');
            $table->integer('item_order')->comment('表示順');
            $table->softDeletes()->nullable()->comment('削除フラグ');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');

            $table->primary(['collection_genre_id', 'collection_item_id']);

            $table->comment('分類別の項目');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_has_items');
    }
}
