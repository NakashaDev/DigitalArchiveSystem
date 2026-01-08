<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionItemLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_item_lang', function (Blueprint $table) {
            $table->integer('item_id')->comment('項目ID');
            $table->integer('lang_code')->comment('言語コード');
            $table->string('item_label', 64)->comment('項目ラベル');
            $table->string('item_desc', 256)->nullable()->comment('項目説明');
            $table->string('item_value_labels', 512)->nullable()->comment('INPUT値ラベル');
            $table->softDeletes()->nullable()->comment('削除フラグ');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日時');

            $table->primary(['item_id', 'lang_code']);

            $table->comment('資料項目・多言語');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_item_lang');
    }
}
