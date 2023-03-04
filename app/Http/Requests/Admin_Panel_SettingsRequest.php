<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @method auth()
 */
class Admin_Panel_SettingsRequest extends FormRequest
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
            'system_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'system_name.required' => 'System Name can\'t be Empty',
            'phone.required' => 'Phone can\'t be Empty',
            'address.required' => 'Address can\'t be Empty',
        ];
    }


}
