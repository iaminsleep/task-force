<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    protected $redirectRoute = 'task-create.page';
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
            'name' => 'required',
            'description' => 'required|min:20|max:2000',
            'category_id' => 'required',
            'location' => 'required',
            'budget' => 'required|min:100|max:1000000',
            'deadline' => 'required|date',
        ];
    }
}
