<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyCustomerServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_customer_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('survey_information_id');
            $table->unsignedTinyInteger('atencion_preventa');
            $table->unsignedTinyInteger('oferta_calidad');
            $table->unsignedTinyInteger('oferta_plazo');
            $table->unsignedTinyInteger('entrega_plazo')->nullable();
            $table->unsignedTinyInteger('precios');
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
        Schema::dropIfExists('survey_customer_services');
    }
}
