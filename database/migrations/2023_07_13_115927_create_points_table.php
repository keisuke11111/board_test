<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->integer('join_id');
            $table->integer('user_id');
            $table->integer('point')->default(0);
            $table->string('op_name');
            $table->unsignedInteger('points_added')->default(0)->comment('取得したポイント');
            $table->unsignedInteger('points_used')->default(0)->comment('利用済みポイント');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
