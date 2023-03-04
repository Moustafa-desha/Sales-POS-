<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreasuriesRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:1',
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
            'active.required' => 'حاله الخزنه مطلوبه',
            'is_master.required' => 'نوع الخزنه مطلوب',
            'last_receipt_exchange.required' => 'اخر إيصال صرف نقديه مطلوب',
            'last_receipt_exchange.integer' => 'اخر إيصال صرف نقديه يجب ان يكون عدد صحيح',
            'last_receipt_collect.required' => 'اخر إيصال تحصيل نقديه مطلوب',
            'last_receipt_collect.integer' => 'اخر إيصال تحصيل نقديه يجب ان يكون عدد صحيح',
        ];
    }
}
