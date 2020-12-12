<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warrant_id');
            $table->foreign('warrant_id')->references('id')->on('warrants')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('assigned_to');
            $table->foreign('assigned_to')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('relative_name');
            $table->string('relative_address');
            $table->string('relative_contact_no');
            $table->text('description');
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
        Schema::dropIfExists('activity_details');
    }
}
