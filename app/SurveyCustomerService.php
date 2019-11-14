<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyCustomerService extends Model
{
    use SoftDeletes;

    protected $fillable = ['atencion_preventa', 'oferta_calidad', 'oferta_plazo', 'entrega_plazo', 'precios'];

    public function survey()
    {
        return $this->belongsTo('App\SurveyInformation');
    }
}
