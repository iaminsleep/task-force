<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\RealAddressRule;

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
            'title' => 'required',
            'description' => 'required|min:10|max:2000',
            'category_id' => 'required',
            'location' => ['nullable', new RealAddressRule()],
            'budget' => 'required|integer|between:100,1000000',
            'deadline' => 'required|date|after:yesterday',
            'files' => 'required',
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
            'title.required' => 'Введите заголовок задания (это то, что первым делом увидит исполнитель)',

            'description.required' => 'Заполните описание, чтобы исполнитель знал, с чем имеет дело',
            'description.min' => 'Слишком короткое описание задания',
            'description.max' => 'Слишком длинное описание задания',

            'category_id.required' => 'Задание должно принадлежать одной из категорий',

            'budget.required' => 'Введите бюджет задания',
            'budget.numeric' => 'Бюджет должен быть числовым значением',
            'budget.digits_between' => 'Слишком маленький или большой бюджет задания',

            'deadline.required' => 'Дата обязательна для заполнения',
            'deadline.date' => 'Дата неправильного формата',
            'deadline.after' => 'Срок исполнения не может быть раньше текущей даты',

            'files.required' => 'Прикрепите хотя бы один файл, который поможет исполнителю узнать детали задания (например, фотографию)',
        ];
    }
}
