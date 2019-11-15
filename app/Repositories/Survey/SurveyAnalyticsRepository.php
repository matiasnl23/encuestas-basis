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
        $unresponsed_maintenance = SurveySource::doesntHave('surveys')
            ->where('is_maintenance', true)->count();
        $unresponsed_ts = SurveySource::doesntHave('surveys')
            ->where('is_maintenance', false)->count();
        $responsed_maintenance = SurveySource::has('surveys')
            ->where('is_maintenance', true)->count();
        $responsed_ts = SurveySource::has('surveys')
            ->where('is_maintenance', false)->count();

        return [
            'unresponsed' => [
                'total' => $unresponsed_maintenance + $unresponsed_ts,
                'maintenance' => $unresponsed_maintenance,
                'technical_service' => $unresponsed_ts,
            ],
            'responsed' => [
                'total' => $responsed_maintenance + $responsed_ts,
                'maintenance' => $responsed_maintenance,
                'technical_service' => $responsed_ts,
            ]
        ];
    }
}
