<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warrant_id');
            $table->foreign('warrant_id')->references('id')->on('warrants')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('activist_id');
            $table->foreign('activist_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->float('lattitude');
            $table->float('longitude');
            $table->boolean('status');
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
        Schema::dropIfExists('activities');
    }
}