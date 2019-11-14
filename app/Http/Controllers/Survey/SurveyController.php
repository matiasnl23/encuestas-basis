<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\SurveyInformation;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = SurveyInformation::all();

        return response($surveys);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\SurveyAdministration  $surveyAdministration
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'route' => 'encuesta/{$id}',
            'method' => 'get'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SurveyAdministration  $surveyAdministration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response([
            'route' => 'encuesta/{$id}',
            'method' => 'delete'
        ]);
    }
}
