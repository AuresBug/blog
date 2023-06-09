<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'title'   => 'required|string',
            'image'   => [
                'sometimes',
                'mimes:png,jpg',
                'dimensions:min_height=360',
            ],
            'excerpt' => 'required|string',
            'body'    => 'required|string',
            'status'  => 'required|string',

        ];
    }
}
