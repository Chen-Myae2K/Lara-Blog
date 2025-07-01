<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'title' => 'required|unique:categories,title|min:5'
            //ဒီမှာ title က မရေးလည်းရတယ် ဘာလို့ ဆို left side က လည်း title ဆိုတဲ့ နာမည်နဲ့ပဲဖြစ်နေလို့
        ];
    }
}
