<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveySource extends Model
{
    protected $fillable = ['source_token'];

    public function surveys()
    {
        return $this->hasMany('App\SurveyInformation');
    }
}
