<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateArtistRequest extends Request
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
            'NameBand' => 'required|min:3',
            'biography' => 'required|min:10',
            'press_photo1' => 'required|image',
        ];
    }
}
