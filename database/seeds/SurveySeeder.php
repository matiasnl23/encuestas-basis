<?php

use App\SurveyInformation;
use App\SurveySource;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $surveySourcesLength = SurveySource::count();
        $surveysToCreate = $faker->numberBetween(50, 200);

        for ($i=0; $i < $surveysToCreate; $i++) { 
            $id = $faker->numberBetween(1, $surveySourcesLength);
            $surveySource = SurveySource::find($id);

            $surveyInformation = factory(SurveyInformation::class, 1)->make()[0];
            $survey = $surveySource->surveys()->create($surveyInformation->toArray());

            $surveyAdministration = factory(App\SurveyAdministration::class, 1)->make()[0];
            $survey->administration()->create($surveyAdministration->toArray());
            $surveyQuality = factory(App\SurveyQuality::class, 1)->make()[0];
            $survey->quality()->create($surveyQuality->toArray());
            $surveyCustomerService = factory(App\SurveyCustomerService::class, 1)->make()[0];
            $survey->customerService()->create($surveyCustomerService->toArray());

            // Technical service or maintenance service
            if($faker->boolean()) {
                // Is maintenance service
                $surveyMaintenanceService = factory(App\SurveyMaintenanceService::class, 1)->make()[0];
                $survey->maintenanceService()->create($surveyMaintenanceService->toArray());
            } else {
                // Is technical service
                $surveyTechnicalService = factory(App\SurveyTechnicalService::class, 1)->make()[0];
                $survey->technicalService()->create($surveyTechnicalService->toArray());
            }
        }
    }
}
