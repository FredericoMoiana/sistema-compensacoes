<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProjectoRequest extends FormRequest
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
            'acronimo' => [
                'required',
                'string',
                'max:255',
                'min:2'
            ],
            'saldo' => [
                'numeric'
            ],
            'valorGasto' => [
                'numeric'
            ],
            'valorAlocado' => [
                'numeric'
            ],
        ];
    }
}
