<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class TreasuriesUpdateRequest extends FormRequest
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
            'name' => ['required','string',Rule::unique('treasuries')->ignore($request->id)],
            'is_master' => 'required',
            'active' => 'required',
            'last_receipt_exchange' => 'required|integer',
            'last_receipt_collect' => 'required|integer',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'اسم الخزنه مطلوب',
            'name.unique' => 'اسم الخزنه موجود من قبل',
            'active.required' => 'حاله الخزنه مطلوبه',
            'is_master.required' => 'نوع الخزنه مطلوب',
            'last_receipt_exchange.required' => 'اخر إيصال صرف نقديه مطلوب',
            'last_receipt_exchange.integer' => 'اخر إيصال صرف نقديه يجب ان يكون عدد صحيح',
            'last_receipt_collect.required' => 'اخر إيصال تحصيل نقديه مطلوب',
            'last_receipt_collect.integer' => 'اخر إيصال تحصيل نقديه يجب ان يكون عدد صحيح',
        ];
    }
}
