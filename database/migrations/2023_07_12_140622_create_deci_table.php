<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deci', function (Blueprint $table) {
            $table->integer('join_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('qu')->nullable();
            $table->string('email');
            $table->string('tel');
            $table->string('sex');
            $table->integer('jug');
            $table->timestamp('created_at')->nullable();
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deci');
    }
}
