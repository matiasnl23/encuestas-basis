<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyQuality extends Model
{
    use SoftDeletes;

    protected $fillable = ['conformidad', 'recomendacion', 'iso_existencia', 'iso_utilidad', 'comentario'];

    public function survey()
    {
        return $this->belongsTo('App\SurveyInformation');
    }

}
