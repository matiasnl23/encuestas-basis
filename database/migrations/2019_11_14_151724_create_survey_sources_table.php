<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveySourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_sources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('source_uuid', 255);
            $table->string('source_hash', 255);
            $table->unsignedBigInteger('client_id');
            $table->boolean('is_maintenance')->default(false);
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
        Schema::dropIfExists('survey_sources');
    }
}
