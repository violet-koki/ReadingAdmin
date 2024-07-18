<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Consts\Gender;
use Illuminate\Validation\Rule;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->path() == 'api/user/register';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nick_name" => ['required', 'string'],
            "name" => ['required', 'string'],
            "mail" => ['required', 'string'],
            "gender" => ['required', Rule::enum(Gender::class)],
            "password" => ['required', 'string'],
        ];
    }
}
