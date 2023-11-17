<?php

namespace App\Http\Requests;
use App\Models\Commander;

use Illuminate\Foundation\Http\FormRequest;

class CreateDuelRequest extends FormRequest
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

     public function rules(): array {
        
        return [

            'date' => 'required|date',
            'celebrated_at' => 'required',
            'winner_commander' => 'required|exists:commanders,commander_ID',
            'loser_commander' => 'required|exists:commanders,commander_ID',

            'winner_mana_used' => [
                'required',
                'integer',
                'min:10',
                'max:100',
                
                function ($attribute, $value, $fail) {

                    $winner = Commander::find($this->input('winner_commander'));
                    if ($winner?->mana < $value) {
                        $fail('Selected Commander mana must be less than or equal to the available mana');
                    }

                },             

            ],

            'loser_mana_used' => [
               'required',
               'integer',
               'min:10',
               'max:100',

               function ($attribute, $value, $fail) {

                    $loser = Commander::find($this->input('loser_commander'));
                    if ($loser?->mana < $value) {
                        $fail('Selected Commander mana must be less than or equal to the available mana');
                    }
                    
                },  

            ],

        ];

    }

    public function withValidator($validator) {

        $validator->after(function ($validator) {
            if ($this->input('winner_mana_used') > $this->input('loser_mana_used')) {
                $validator->errors()->add('winner_mana_used', 'The winner cannot have used more mana than the loser.');
            }

        });

    }

}