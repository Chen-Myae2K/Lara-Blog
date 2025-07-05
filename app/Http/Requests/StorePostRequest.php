<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            "title" => "required|min:3|unique:posts",
            "category" => "required|exists:categories,id",
            "photos" => "required",
            "photos.*" => "mimes:jpg,png,jpeg|file",
            "description" => "required|min:10",
            "featured_image" => "nullable|mimes:png,jpg,jpeg|file|max:512"
        ];
    }
}
