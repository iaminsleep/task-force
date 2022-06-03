<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
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
        return [
            'file' => 'required|mimes:jpeg,jpg,png,gif,docx,pdf,doc,pptx,xlsx,txt,xlx,xls|max:5120',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'file.required' => 'Вы не приложили файл',
            'file.mimes' => 'Этот тип файла не поддерживается системой',
            'file.max' => 'Слишком большой размер файла',
        ];
    }
}
