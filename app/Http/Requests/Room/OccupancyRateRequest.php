<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class OccupancyRateRequest extends FormRequest
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
        dd(gettype(request()->all()['room_ids']));

        return [
            'room_ids' => 'sometimes',
            'room_ids*' => '|exists:rooms,id'
        ];
    }
}
