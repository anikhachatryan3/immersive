<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('hat_id')->references('id')->on('hats')->onDelete('cascade');
            // $table->Integer('hat_id');
            $table->Integer('user_id');
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
        Schema::dropIfExists('user_hats');
    }
}
