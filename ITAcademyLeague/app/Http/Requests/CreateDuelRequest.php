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
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'celebrated_at' => 'required',
            'winner_commander' => 'required|exists:commanders,commander_ID',
            'loser_commander' => 'required|exists:commanders,commander_ID',

            'winner_mana_used' => [
                'required',
                'integer',
                'min:0',
                'max:100',

                function ($attribute, $value, $fail) {
                    $loserMana = $this->input('loser_mana_used');
                    if ($value < $loserMana) {
                        $fail('Winner mana used must be greater than or equal to the loser mana used.');
                    }
                },
            ],

            'loser_mana_used' => [
                'required',
                'integer',
                'min:0',
                'max:100',

                function ($attribute, $value, $fail) {
                    $winnerMana = $this->input('winner_mana_used');
                    if ($value > $winnerMana) {
                        $fail('Loser mana used must be less than or equal to the winner mana used.');
                    }
                },
            ],
        ];
    }
}