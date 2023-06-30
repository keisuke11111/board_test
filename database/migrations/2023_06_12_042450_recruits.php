<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recruits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('recruits', function (Blueprint $table) {
            $table->increments('id')->PrimaryKey();
            $table->integer('op_id');
            $table->string('title');
            $table->string('period');
            $table->string('time');
            $table->string('money');
            $table->string('capacity');
            $table->string('human');
            $table->string('place');
            $table->string('address');
            $table->text('coment');
            $table->string('img_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('recruits');
    }
}
