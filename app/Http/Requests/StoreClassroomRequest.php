<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
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
                            //classrooms the table name in database
            'List_Classes.*.Name'           => 'required|unique:classrooms,name_class->ar,'.$this->id,
            'List_Classes.*.Name_class_en'  => 'required|unique:classrooms,name_class->en,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'Name.required'             => trans('validation.required'),
            'Name.unique'               => trans('validation.unique'),
            'Name_class_en.required'    => trans('validation.required'),
            'Name_class_en.unique'      => trans('validation.unique'),
        ];
    }
}
