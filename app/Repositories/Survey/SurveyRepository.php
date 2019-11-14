<?php

namespace App\Repositories\Survey;

use App\SurveySource;

class SurveyRepository
{
    public function getSurveyForm(string $uuid, string $hash): ?array
    {
        if($exists = $this->checkIfSurveyExists($uuid, $hash)) {
            return ['is_maintenance' => $exists->is_maintenance];
        }

        return null;
    }

    private function checkIfSurveyExists(string $uuid, string $hash): ?SurveySource
    {
        $source = SurveySource::where([ 'source_uuid' => $uuid, 'source_hash' => $hash])->first();

        return $source;
    }
}
