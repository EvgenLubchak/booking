<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomReservationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string', 'max:50', 'min:2'],
            'phone' => ['nullable','string', 'max:50'],
            'email' => ['nullable', 'email'],
            'guests' => ['integer', 'max:5', 'min:1'],
            'range' => ['required', 'string', 'max:50'],
        ];
    }
}
