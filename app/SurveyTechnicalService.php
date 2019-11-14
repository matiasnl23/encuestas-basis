<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyTechnicalService extends Model
{
    use SoftDeletes;

    protected $fillable = ['ingenieria', 'puesta_servicio', 'capacitacion', 'montaje'];

    public function survey()
    {
        return $this->belongsTo('App\SurveyInformation');
    }

}
