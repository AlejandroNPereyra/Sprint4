<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCommanderRequest extends FormRequest
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

            'commander_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'email' => 'required|email|unique:commanders,email',

        ];

    }

    public function messages() {

        return [

            'commander_name.required' => 'The Commander Name is required.',
            'description.required' => 'The Description is required.',
            'email.required' => 'The Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered as a Commander.',

        ];

    }

}