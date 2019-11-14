<?php

use Illuminate\Database\Seeder;

class SurveySourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SurveySource::class, 100)->create();
    }
}
