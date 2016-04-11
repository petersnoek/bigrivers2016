<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PerformanceRequest extends Request
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

        $input=$this->all();
        if ($input['start_date'] == $input['finish_date'])
        {
            return [
                'artist_id' => 'required|integer',
                'stage_id' => 'required|integer',

                'start_time' => 'required|date_format:H:i|before:finish_time',
                'start_date' => 'required|date',

                'finish_time' => 'required|date_format:H:i',
                'finish_date' => 'required|date',
            ];
        }
        else
        {
            return [
                'artist_id' => 'required|integer',
                'stage_id' => 'required|integer',

                'start_time' => 'required|date_format:H:i',
                'start_date' => 'required|date|before:finish_date',

                'finish_time' => 'required|date_format:H:i',
                'finish_date' => 'required|date',
            ];
        }
    }
}
