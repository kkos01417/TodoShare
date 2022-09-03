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
    Schema::create('cruds', function (Blueprint $table) {
      $table->id();
      $table->string('task_name')->nullable()->change();
      $table->text('task_description')->nullable()->change();
      $table->string('assign_person_name');
      $table->string('estimate_hour')->nullable()->change();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('cruds', function (Blueprint $table) {
      $table->string('task_name')->nullable(false)->change();
      $table->text('task_description')->nullable(false)->change();
      $table->string('estimate_hour')->nullable(false)->change();
    });
  }
};
