<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('model_histories', function (Blueprint $table) {
      $table->id();
      $table->string('model')->comment('モデル名');
      $table->unsignedBigInteger('model_id')->comment('モデルのID');
      $table->unsignedBigInteger('user_id')->comment('操作したユーザー');
      $table->string('operation_type')->comment('操作のタイプ'); // created, updated, deleted, retrieved
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('model_histories');
  }
};
