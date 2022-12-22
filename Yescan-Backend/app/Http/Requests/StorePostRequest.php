<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' =>  'required', 'max:255',
            'apellido'=> 'required', 'email:rfc,dns', 'max:255',
            'email' => 'required', 'email', 'max:100',
            'mensaje' => 'required', 'max:500',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar su nombre',
            'nombre.max' => 'Su nombre no puede superar los 50 caracteres',
            'apellido.required' => 'Debe ingresar su apellido',
            'apellido.max' => 'Su apellido no puede superar los 50 caracteres',
            'emil.required' => 'Debe ingresar su correo electronico',
            'email.email' => 'El correo electronico ingresado no tiene el formato correcto',
            'email.max' => 'Su correo electronico no de puede superar los 50 caracteres',
            'mensaje.required' => 'Debe ingresar la consulta a realizar',
            'nombre.max' => 'Su consulta no puede superar los 500 caracteres',
        ];
    }

}
