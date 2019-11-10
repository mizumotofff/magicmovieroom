<?php

namespace magicmovieroom\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Social extends FormRequest
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
          'file' => 'mimes:mp4',
          'thumbnail' => 'required|mimes:jpg,png.bmp',
        ];
    }
}
