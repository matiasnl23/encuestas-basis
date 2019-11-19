<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyInformation extends Model
{
    use SoftDeletes;

    protected $fillable = ["name", "job_title", "email"];

    public function customerService()
    {
        return $this->hasOne('App\SurveyCustomerService');
    }

    public function technicalService()
    {
        return $this->hasOne('App\SurveyTechnicalService');
    }

    public function maintenanceService()
    {
        return $this->hasOne('App\SurveyMaintenanceService');
    }

    public function administration()
    {
        return $this->hasOne('App\SurveyAdministration');
    }

    public function quality()
    {
        return $this->hasOne('App\SurveyQuality');
    }
}
