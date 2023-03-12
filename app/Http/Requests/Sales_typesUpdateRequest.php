<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class Sales_typesUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => ['required','string',Rule::unique('sales_matiral_types')->ignore($request->id)],
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'اسم الفئه مطلوب',
            'name.unique' => 'اسم الفئه موجود من قبل',
            'active.required' => 'حاله الفئه مطلوبه',
        ];
    }
}
