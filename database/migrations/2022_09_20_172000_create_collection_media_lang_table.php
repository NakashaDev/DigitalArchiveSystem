<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionMediaLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_media_lang', function (Blueprint $table) {
            $table->integer('media_id')->comment('メディアID');
            $table->integer('lang_code')->comment('言語コード');
            $table->integer('collection_id')->index('collection_media_lang_IX1')->comment('資料ID');
            $table->string('media_title', 250)->comment('メディアタイトル');
            $table->string('media_path')->comment('メディアpath');
            $table->string('media_thumb')->nullable()->comment('サムネイルpath');
            $table->string('media_desc', 500)->nullable()->comment('説明');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('変更日時');

            $table->primary(['media_id', 'lang_code']);

            $table->comment('資料メディア・多言語');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_media_lang');
    }
}
