<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->integer('collection_id', true)->comment('資料ID');
            $table->smallInteger('collection_genre_id')->comment('資料分類ID');
            $table->string('manage_num', 64)->comment('管理番号');
            $table->integer('main_image_id')->nullable()->comment('メイン画像ID');
            $table->tinyInteger('is_public')->comment('公開・非公開');
            $table->integer('created_by')->comment('登録ユーザー');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('変更日時');

            $table->comment('資料');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
