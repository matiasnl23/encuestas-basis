<?php

namespace App\Repositories\Survey;

use App\SurveyMaintenanceService;
use App\SurveySource;
use App\SurveyTechnicalService;

class SurveyAnalyticsRepository
{
    public function getUnresponsedSurveys()
    {
        return SurveySource::doesntHave('surveys')->get();
    }

    public function getResponsedSurveys()
    {
        return SurveySource::has('surveys')->with('surveys')->get();
    }

    public function countersOfSurveys()
    {
        $unresponsed = SurveySource::doesntHave('surveys')->count();
        $responsed = SurveySource::has('surveys')->count();

        return [
            'unresponsed' => $unresponsed,
            'responsed' => [
                'count' => $responsed
            ]
        ];
    }
}
