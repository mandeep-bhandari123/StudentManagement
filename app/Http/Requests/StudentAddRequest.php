<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentAddRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        'name'=>"required|string|max:225",
        "email"=>"required|email|unique:students:email",
        "age"=>"required|integer|min:1|max:100",
        "date_of_birth"=>"required:date",
        "gender"=>"required|in:m,f",
        ];
    }
    public function messages(){
      return [
        "name.required"=>"Please write Students Name",
        "age.max" => "Pls give a valid age"
      ];
    }
}
