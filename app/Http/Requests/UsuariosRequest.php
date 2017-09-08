<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                        'nombres' => 'required|string|min:3|max:60',
                        'apellidos' => 'required|string|min:3|max:60',
                        'cedula' => 'required|digits_between:8,10|unique:usuarios,cedula,'.$this->get('id'),
                        'email' => 'required|email|unique:usuarios,email,'.$this->get('id'),
                        'telefono' => 'digits_between:10,12'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                        'nombres' => 'required|string|min:3|max:60',
                        'apellidos' => 'required|string|min:3|max:60',
                        'cedula' => 'required|digits_between:8,10',
                        'email' => 'required|email',
                        'telefono' => 'digits_between:10,12'
                ];
            }
            default:break;
        }

    }

    /**
     * Get the validation message rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombres.required' => 'Los nombres son requeridos.',
            'apellidos.required' => 'Los apellidos son requeridos.',
            'cedula.required' => 'La cédula es requerida.',
            'email.required' => 'El email es requerido.',
            'nombres.min' => 'La longitud de los nombres debe ser entre :min y :max caractéres',
            'nombres.max' => 'La longitud de los nombres debe ser entre :min y :max caractéres.',
            'apellidos.min' => 'La longitud de los nombres debe ser entre :min y :max caractéres.',
            'apellidos.max' => 'La longitud de los apellidos debe ser entre :min y :max caractéres.',
            'cedula.unique' =>'Ya existe un registro con la cédula existente.',
            'cedula.digits_between' => 'La cédula debe estar entre :min y :max dígitos.',
            'email.unique' =>'Ya existe un registro con el email existente.',
            'email.email' =>'El email no tiene un formato válido.',
            'telefono.digits_between' => 'El teléfono debe estar entre :min y :max dígitos.'
        ];
    }

}
