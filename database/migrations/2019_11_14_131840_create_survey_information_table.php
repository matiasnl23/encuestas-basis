<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('survey_source_id')->nullable();
            $table->string('name', 50);
            $table->string('job_title', 150);
            $table->string('email', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_information');
    }
}
