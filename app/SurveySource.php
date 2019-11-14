<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveySource extends Model
{
    protected $fillable = ['source_uuid', 'source_hash', 'client_id', 'is_maintenance'];

    public function surveys()
    {
        return $this->hasMany('App\SurveyInformation');
    }
}
