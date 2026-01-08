<?php

use App\Enums\ItemType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_items', function (Blueprint $table) {
            $table->integer('collection_item_id', true)->comment('ID');
            $table->string('item_name', 64)->comment('項目名');
            $table->enum('item_input_type', ItemType::getValues())->comment('INPUT形式');
            $table->tinyInteger('item_data_length')->nullable()->comment('データサイズ');
            $table->tinyInteger('item_data_length2')->nullable()->comment('データサイズ２　小数点数');
            $table->integer('item_required')->comment('必修フラグ 0: 任意、1: 必修');
            $table->string('item_values', 512)->nullable()->comment('INPUT値');
            $table->integer('item_order')->comment('表示順');
            $table->softDeletes()->nullable()->comment('削除フラグ');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('変更日時');

            $table->unique(['item_name'], 'collection_items_have_unique_name');

            $table->comment('資料項目');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_items');
    }
}
