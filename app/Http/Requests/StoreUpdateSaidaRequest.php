<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSaidaRequest extends FormRequest
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
            'projecto_id' => [
                'required',
                'integer',
            ],
            'participante_id' => [
                'required',
                'integer',
            ],
            'valor' => [
                'required',
                'numeric'
            ],
            'visita' => [
                'required',
                'string',
            ],
        ];
    }
}
