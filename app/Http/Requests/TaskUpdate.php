<?php

namespace App\Http\Requests;


class TaskUpdate extends Request
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
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
            'due_date' => 'nullable|date',
            'type' => 'nullable|in:PUBLIC,PRIVATE',
            'status' => 'nullable|in:TODO,DOING,DONE',
        ];
    }
}
