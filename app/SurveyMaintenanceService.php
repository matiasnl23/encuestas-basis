<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyMaintenanceService extends Model
{
    use SoftDeletes;

    protected $fillable = ['horarios_fechas', 'tecnico_capacidad', 'programa_mantenimiento', 'velocidad_respuesta', 'general'];

    public function survey()
    {
        return $this->belongsTo('App\SurveyInformation');
    }
}
