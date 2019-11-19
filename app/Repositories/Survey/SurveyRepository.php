<?php

namespace App\Repositories\Survey;

use App\SurveyInformation;
use App\SurveySource;

class SurveyRepository
{
    public function getSurveySource(string $uuid, string $hash)
    {
        return SurveySource::where(['source_uuid' => $uuid, 'source_hash' => $hash])
            ->firstOrFail();
    }

    public function getSurveyForm(string $uuid, string $hash): ?array
    {
        if($exists = $this->getSurveySource($uuid, $hash)) {
            return ['is_maintenance' => $exists->is_maintenance];
        }

        return null;
    }

    public function storeSurvey(SurveySource $source, array $payload)
    {
        $survey_information = $source->surveys()->create($payload);
        $survey_information->customerService()->create($payload);
        $survey_information->administration()->create($payload);
        $survey_information->quality()->create($payload);

        if($source->is_maintenance) {
            $survey_information->maintenanceService()->create($payload);
        } else {
            $survey_information->technicalService()->create($payload);
        }

        return $survey_information->load([
            'customerService',
            $source->is_maintenance ? 'maintenanceService' : 'technicalService',
            'administration',
            'quality'
        ]);
    }

    public function checkBodyParams(SurveySource $source, $payload)
    {
        // Params in each service
        $maintenance_keys = [ 'horarios_fechas', 'tecnico_capacidad',
        'programa_mantenimiento', 'velocidad_respuesta', 'general' ];

        $technical_keys = [ 'ingenieria', 'puesta_servicio', 'capacitacion',
        'montaje' ];

        // Allowed and rejected
        $allowed = $source->is_maintenance ? $maintenance_keys : $technical_keys;
        $rejected = $source->is_maintenance ? $technical_keys : $maintenance_keys;

        $counter = 0;
        foreach($payload as $key => $value) {
            // Check if keys of technical service or maintenance service params
            // is in payload and then return error.
            if(in_array($key, $rejected)) {
                $message = $source->is_maintenance ?
                    'There must be at least one maintenance parameter and technical parameters has been found' :
                    'There must be at least one technical parameter and maintenance parameters has been found';

                return [
                    'message' => 'The given data was invalid',
                    'errors' => [ 'params' => $message ]
                ];
            }

            // Check if at least one key of technical service or
            // maintenance service exists.
            if(in_array($key, $allowed)) {
                $counter++;
            }
        }

        if($counter == 0) {
            $message = $source->is_maintenance ?
                'There must be at least one maintenance parameter' :
                'There must be at least one technical parameter';

            return [
                'message' => 'The given data was invalid',
                'errors' => [ 'params' => $message ]
            ];
        }
    }

    public function verifyIfSurveyHasBeenDone(int $id, string $email)
    {
        $survey = SurveyInformation::where([
            'survey_source_id' => $id,
            'email' => $email
        ])->first();

        if($survey) {
            return [
                'message' => 'The survey is already completed',
            ];
        }

        return;
    }
}
