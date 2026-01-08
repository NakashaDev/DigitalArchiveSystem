<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionGenreLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_genre_lang', function (Blueprint $table) {
            $table->integer('collection_genre_id')->comment('資料分類ID');
            $table->integer('lang_code')->comment('言語コード');
            $table->string('genre_name', 128)->comment('分類名');
            $table->string('genre_name_v', 128)->nullable()->comment('表示名');
            $table->softDeletes()->nullable()->comment('削除フラグ');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('変更日時');

            $table->primary(['collection_genre_id', 'lang_code']);

            $table->comment('資料分類・多言語');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_genre_lang');
    }
}
