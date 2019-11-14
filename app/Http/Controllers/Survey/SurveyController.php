<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Repositories\Survey\SurveyRepository as Repo;
use App\SurveyInformation;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    private $repo;

    public function __construct() {
        $this->repo = new Repo();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uuid = $request->query('i') ?? '';
        $hash = $request->query('h') ?? '';

        $surveyForm = $this->repo->getSurveyForm($uuid, $hash);

        if(!$surveyForm) {
            return response(null, 404);
        }

        return $surveyForm;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         

        return response([
            'route' => 'encuesta/',
            'method' => 'post'
        ]);
    }
}
