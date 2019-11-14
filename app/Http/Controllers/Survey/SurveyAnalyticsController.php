<?php

namespace App\Http\Controllers\Survey;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Survey\SurveyAnalyticsRepository as Analytics;

class SurveyAnalyticsController extends Controller
{
    public $repo;

    public function __construct() {
        $this->repo = new Analytics();
    }

    public function index(Request $request)
    {
        if($request->query('unresponsed') === 'y') {
            return $this->repo->getUnresponsedSurveys();
        }

        return $this->repo->getResponsedSurveys();
    }

    public function counter() {
        

        return [
            'route' => 'analytics/counter',
            'method' => 'get'
        ];
    }
}
