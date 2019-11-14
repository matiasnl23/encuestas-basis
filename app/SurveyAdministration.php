<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyAdministration extends Model
{
    use SoftDeletes;

    protected $fillable = ['atencion_telefonica', 'inconveniente', 'solucionado'];

    public function survey()
    {
        return $this->belongsTo('App\SurveyInformation');
    }
}
