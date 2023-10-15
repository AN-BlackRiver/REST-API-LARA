<?php

namespace App\Http\Requests\API\Post;

use App\Http\Requests\API\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrCreateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
            //'image' => ['image'],
            'is_published' => ['required', 'boolean']
        ];
    }
}
