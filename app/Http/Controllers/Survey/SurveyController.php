<?php

namespace App\Http\Controllers\Survey;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSurvey;
use App\Http\Controllers\Controller;
use App\Repositories\Survey\SurveyRepository as Repo;

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

        return $surveyForm;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSurvey $request)
    {
        $source = $this->repo->getSurveySource($request->uuid, $request->hash);
        $payload = $request->except('uuid', 'hash');
        
        // Return an error if the survey has been completed for this email
        if($error = $this->repo->verifyIfSurveyHasBeenDone($source->id, $payload['email'])) {
            return response($error, 409);
        }

        // Return an error if maintenance or technical params are invalid
        $checkBody = $this->repo->checkBodyParams($source, $payload);
        if($checkBody) {
            return response($checkBody, 422);
        }

        return $this->repo->storeSurvey($source, $payload);
    }
}
