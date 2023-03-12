<?php

namespace App\Http\Requests;

use App\Rules\KnowledgeRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'      => 'required|min:5|max:100',
            'email'     => [
                'required',
                'email',
                'max:100',
                Rule::unique('employees')->ignore($this->id)
            ],
            'cpf'       => [
                'required',
                'cpf',
                Rule::unique('employees')->ignore($this->id),
            ],
            'phone'     => 'nullable|celular_com_ddd',
            'knowledge' => [
                'required',
                new KnowledgeRule()
            ],
            'status'    => 'required|in:validated,not_validated',
        ];
    }
}
