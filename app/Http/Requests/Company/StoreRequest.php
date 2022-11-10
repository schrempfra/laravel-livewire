<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {   
        return [
            'name' => 'required|string',
            'logo' => 'required|image|mimetypes:image/*|max:10240|dimensions:min_width=100,min_height=100',
            'email' => 'required|email',
            'type' => 'required|string',
            'city' => 'required|exists:cities,city',
            'street' => 'required|string',
            'street_number' => 'required|string',
            'phone_number' => 'sometimes|string',
            'zip_code' => 'required|string',
            'description' => 'required|string',
            'lat' => 'sometimes|string|nullable',
            'lng' => 'sometimes|string|nullable',
            'google_maps' => 'sometimes|url',
            'website' => 'sometimes|url|nullable',
            'facebook' => 'sometimes|url|nullable',
            'twitter' => 'sometimes|url|nullable',
            'instagram' => 'sometimes|url|nullable',
        ];
    }
}
