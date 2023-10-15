<?php

namespace App\Http\Requests\API\Post;

use App\Http\Requests\API\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends ApiRequest
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
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
            'image' => ['image'],
            'is_published' => ['required', 'boolean']
        ];
    }
}
