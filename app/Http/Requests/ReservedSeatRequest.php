<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservedSeatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => 'required|max:255',
            'customer_last_name' => 'required|max:255',
            'reserved_at' => 'required',
            'phone_number' => 'required',
            'file' => 'required|mimes:pdf'
        ];
    }
}
