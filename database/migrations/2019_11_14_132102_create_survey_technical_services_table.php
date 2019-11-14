<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTechnicalServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_technical_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('survey_information_id');
            $table->unsignedTinyInteger('ingenieria');
            $table->unsignedTinyInteger('puesta_servicio');
            $table->unsignedTinyInteger('capacitacion')->nullable();
            $table->unsignedTinyInteger('montaje')->nullable();
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
        Schema::dropIfExists('survey_technical_services');
    }
}
