<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    /**
    * The route that users should be redirected to if validation fails.
    *
    * @var string
    */
    protected $redirectRoute = 'articles.index';

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:articles',
            'body' => 'required|min:1000'
        ];
    }
}
