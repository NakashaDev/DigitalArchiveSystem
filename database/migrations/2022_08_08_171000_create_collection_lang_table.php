<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_lang', function (Blueprint $table) {
            $table->integer('collection_id')->comment('資料ID');
            $table->smallInteger('lang_code')->comment('言語コード');
            $table->string('title', 256)->comment('タイトル');
            $table->string('title_m', 256)->comment('タイトル（管理用）');
            // ...（共通項目）
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('変更日時');

            $table->primary(['collection_id', 'lang_code']);

            $table->comment('資料・多言語');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_lang');
    }
}
