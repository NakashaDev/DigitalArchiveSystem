<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true)->comment('ID');
            $table->string('name', 128)->comment('お名前');
            $table->string('email', 128)->index('users_IX1')->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable()->comment('メアド認証日時');
            $table->string('password')->comment('パスワード');
            $table->string('note', 512)->nullable()->comment('備考');
            $table->rememberToken()->comment('記憶トークン');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->useCurrent()->comment('変更日時');

            $table->comment('ユーザー');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
