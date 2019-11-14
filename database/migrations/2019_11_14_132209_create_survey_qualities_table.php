<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyQualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_qualities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('survey_information_id');
            $table->unsignedTinyInteger('conformidad');
            $table->unsignedTinyInteger('recomendacion');
            $table->unsignedTinyInteger('iso_existencia');
            $table->unsignedTinyInteger('iso_utilidad');
            $table->text('comentario');
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
        Schema::dropIfExists('survey_qualities');
    }
}
