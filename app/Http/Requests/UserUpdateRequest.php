<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:225', Rule::unique('users', 'username')->ignore($this->user->id)],
            'first_name' => ['required', 'string', 'max-:25'],
            'last_name' => ['required', 'string', 'max:225'],
            'email' => ['required', 'string', 'max:225', Rule::unique('users', 'username')->ignore($this->user->id)],
        ];
    }
}
