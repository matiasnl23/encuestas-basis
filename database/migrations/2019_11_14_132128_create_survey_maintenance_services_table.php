<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyMaintenanceServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_maintenance_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('survey_information_id');
            $table->unsignedTinyInteger('horarios_fechas');
            $table->unsignedTinyInteger('tecnico_capacidad');
            $table->unsignedTinyInteger('programa_mantenimiento');
            $table->unsignedTinyInteger('velocidad_respuesta');
            $table->unsignedTinyInteger('general');
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
        Schema::dropIfExists('survey_maintenance_services');
    }
}
