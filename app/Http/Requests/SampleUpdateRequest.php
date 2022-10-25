<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleUpdateRequest extends FormRequest
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
            'sample.name' => 'required|string|min:1|max:20',
            'sample.detail' => 'nullable|string|max:200',
            'sample.price' => 'nullable|numeric|max:999999',
            'sample.time' => 'nullable|numeric|max:999999',
        ];
    }

    public function attributes()
    {
        return [
            'sample.name' => 'タイトル',
            'sample.detail' => '詳細',
            'sample.price' => '費用',
            'sample.time' => '制作時間',
        ];
    }

    public function messages()
    {
        return [
            'sample.name.required' => ':attributeを入力してください。',
            'sample.name.min' => ':attributeを入力してください。',
            'sample.name.max' => ':attributeは20文字以下で入力してください。',
            'sample.detail.max' => ':attributeは200文字以下で入力してください。',
            'sample.price.max' => ':attributeは999999以下で入力してください。',
            'sample.time.max' => ':attributeは999999以下で入力してください。',
            'sample.price' => '費用',
        ];
    }
}
