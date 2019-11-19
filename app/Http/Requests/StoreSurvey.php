<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSurvey extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $maintenance = implode(',', [
            'horarios_fechas',
            'tecnico_capacidad',
            'programa_mantenimiento',
            'velocidad_respuesta',
            'general'
        ]);

        $technical = implode(',', [
            'ingenieria',
            'puesta_servicio',
            'capacitacion',
            'montaje'
        ]);

        return [
            // Origin
            'uuid' => 'required|uuid',
            'hash' => 'required|string',

            // Information
            'name' => 'required|string|max:100',
            'job_title' => 'required|string|max:100',
            'email' => 'required|email|max:100',

            // Customer Service
            'atencion_preventa' => 'required|integer|between:1,5',
            'oferta_calidad' => 'required|integer|between:1,5',
            'oferta_plazo' => 'required|integer|between:1,5',
            'entrega_plazo' => 'required|integer|between:1,5',
            'precios' => 'required|integer|between:1,5',

            // Maintenance
            "horarios_fechas" => "required_with:$maintenance|integer|between:1,3",
            "tecnico_capacidad" => "required_with:$maintenance|integer|between:1,3",
            "programa_mantenimiento" => "required_with:$maintenance|integer|between:1,3",
            "velocidad_respuesta" => "required_with:$maintenance|integer|between:1,5",
            "general" => "required_with:$maintenance|integer|between:1,5",

            // Technical
            "ingenieria" => "required_with:$technical|integer|between:1,5",
            "puesta_servicio" => "required_with:$technical|integer|between:1,5",
            "capacitacion" => "integer|between:1,5",
            "montaje" => "integer|between:1,5",
        
            // Administration
            'atencion_telefonica' => 'required|integer|between:1,5',
            'inconveniente' => 'required|integer|between:1,3',
            'solucionado' => 'required_whit:inconveniente|integer|between:1,3',

            // Quality
            'conformidad' => 'required|integer|between:1,5',
            'recomendacion' => 'required|integer|between:1,5',
            'iso_existencia' => 'required|integer|between:1,3',
            'iso_utilidad' => 'required|integer|between:1,5',
            'comentario' => 'required|string|min:30|max:2000',
        ];
    }
}
