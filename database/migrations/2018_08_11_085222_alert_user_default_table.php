<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertUserDefaultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
        Schema::create('hp_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('create_at')->default(0);
            $table->integer('update_at')->default(0);
            $table->string('username',30)->default('');
            $table->char('password',32);
            $table->string('email',50)->default('');
            $table->string('thumb',60)->default('');
            $table->unique('email');
            $table->unique('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hp_users');
    }
}
