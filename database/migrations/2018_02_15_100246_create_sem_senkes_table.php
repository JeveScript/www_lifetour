<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemSenkesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sem_senkes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('wechat_num')->nullable();
            $table->string('phone')->nullable();
            $table->string('hmsr')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('type')->nullable();
            $table->string('ip')->nullable();
            $table->string('position')->nullable();
            $table->text('refferrer')->nullable();
            $table->text('location')->nullable();
            $table->text('content')->nullable();
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
        Schema::dropIfExists('sem_senkes');
    }
}
