<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warrants', function (Blueprint $table) {
            $table->id();
            $table->date('send_date')->format('m-d-Y')->nullable();
            $table->string('zilla_name')->nullable();
            $table->string('other_thana')->nullable();
            $table->string('process_number')->nullable();
            $table->string('gr_number')->nullable();
            $table->string('other_number')->nullable();
            $table->string('warrant_type')->nullable();
            $table->string('thana_name')->nullable();
            $table->string('case_section_and_date')->nullable();
            $table->string('criminal_name')->nullable();
            $table->string('criminal_father_name')->nullable();
            $table->string('criminal_address')->nullable();
            $table->unsignedBigInteger('crime_category_id')->nullable();
            $table->foreign('crime_category_id')
                  ->references('id')->on('crime_categories')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('criminal_NID')->nullable();
            $table->string('criminal_passport')->nullable();
            $table->string('birth_cirtificate')->nullable();
            $table->string('criminal_mobile_no')->nullable();
            $table->string('arrest_criminal_to_court')->nullable();
            $table->string('arrest_warrant_to_thana')->nullable();
            $table->string('arrest_warrant_received_to_thana')->nullable();
            $table->string('court_name')->nullable();
            $table->string('arrest_warrant_picture_one')->nullable();
            $table->string('arrest_warrant_picture_two')->nullable();
            $table->string('criminal_other_document')->nullable();
            $table->tinyInteger('is_executed')->default(0);
            $table->unsignedBigInteger('is_assigned')->nullable();
            $table->foreign('is_assigned')
                  ->references('id')->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                  ->references('id')->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('warrants');
    }
}
