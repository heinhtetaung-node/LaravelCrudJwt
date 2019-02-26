<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
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
            'name' => 'required|string|max:200|regex:/^[\pL\s\-0-9]+$/u',
            'email' => 'required|email|max:200',
            'gender' => 'required|in:male,female',
            'url' => 'required|string|max:200',
            'message' => 'required|string|max:200'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'gender' => '性別',
            'url' => 'URL',
            'message' => 'お問い合わせ内容'
        ];
    }
}
