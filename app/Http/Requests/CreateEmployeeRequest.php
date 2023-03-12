<?php

namespace App\Http\Requests;

use App\Rules\KnowledgeRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'email'     => 'required|email|max:100|unique:employees',
            'cpf'       => 'required|cpf|unique:employees',
            'phone'     => 'nullable|celular_com_ddd',
            'knowledge' => [
                'required',
                new KnowledgeRule()
            ],
            'status'    => 'nullable',
        ];
    }
}
