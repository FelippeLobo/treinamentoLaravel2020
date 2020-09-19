<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'name'=> 'unique:lesson|required|min:3',
            'description' => 'min:3|max:191|required|',
            'slug' => 'required',
            'image' => 'required',
            'video' => 'required',
        ];
    }
}
