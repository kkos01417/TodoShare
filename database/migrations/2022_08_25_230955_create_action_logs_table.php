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
    Schema::create('action_logs', function (Blueprint $table) {
      $table->string('ip_address')->nullable()->comment('IPアドレス');
      $table->string('route')->nullable()->comment('ルートエイリアス');
      $table->string('method')->nullable()->comment('接続メソッド');
      $table->integer('status')->unsigned()->nullable()->comment('返却ステータス');
      $table->string('url')->nullable()->comment('API URL');
      $table->text('user_agent')->nullable()->comment('ユーザーエージェント');
      $table->bigInteger('actioned_by')->nullable()->unsigned()->comment('操作者');
      $table->timestamp('actioned_at')->useCurrent()->comment('操作日時');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('action_logs');
  }
};
