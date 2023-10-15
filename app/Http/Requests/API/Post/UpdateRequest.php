<?php

namespace App\Http\Requests\API\Post;

use App\Http\Requests\API\ApiRequest;

class UpdateRequest extends ApiRequest
{

    public function rules(): array
    {
        return [
            'title' => ['string', 'max:255'],
            'body' => ['string', 'max:255'],
            //'image' => ['image'],
            'is_published' => ['boolean']
        ];
    }
}
