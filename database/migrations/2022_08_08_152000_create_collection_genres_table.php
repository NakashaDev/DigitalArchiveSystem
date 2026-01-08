<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_genres', function (Blueprint $table) {
            $table->integer('collection_genre_id', true)->comment('資料分類ID');
            $table->string('genre_code', 8)->unique('collection_genre_IX1')->comment('分類コード');
            $table->integer('genre_order')->comment('表示順');
            $table->integer('collection_count')->default(0)->comment('登録資料数');
            $table->softDeletes()->nullable()->comment('削除フラグ');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('変更日時');

            $table->comment('資料分類');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_genres');
    }
}
