<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_media', function (Blueprint $table) {
            $table->integer('media_id', true)->comment('メディアID');
            $table->integer('collection_id')->index('collection_media_IX1')->comment('資料ID');
            $table->integer('gallery_id')->index('collection_media_IX2')->nullable()->comment('ギャラリーID');
            $table->integer('media_type')->comment('メディア種類');
            $table->integer('media_subtype')->default(0)->comment('メディア種類詳細');
            $table->integer('per_lang')->default(0)->comment('言語別ファイル  0: 同一、1: 言語別');
            $table->string('media_meta', 512)->nullable()->comment('メタ情報');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('変更日時');

            $table->comment('資料メディア');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_media');
    }
}
