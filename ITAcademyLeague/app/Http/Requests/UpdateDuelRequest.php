<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDuelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    
    public function rules(): array
    {
        return [

            'date' => 'required|date',
            'celebrated_at' => 'required',
            'winner_commander' => 'required',
            'loser_commander' => 'required',
            'winner_mana_used' => 'required|numeric|min:0|max:1000',
            'loser_mana_used' => 'required|numeric|min:0|max:1000',

        ];

    }

}