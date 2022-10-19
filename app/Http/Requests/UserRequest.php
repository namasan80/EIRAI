<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user.name' => 'required|string|min:4|max:20',
            'user.profile' => 'nullable|string|max:200',
            'user.skima_id' => 'nullable|number|max:10',
            'user.twitter_id' => 'nullable|string|max:15',
        ];
    }

    public function attributes()
    {
        return [
            'user.name' => 'ユーザー名',
            'user.profile' => 'プロフィール文',
            'user.skima_id' => 'skimaID',
            'user.twitter_id' => 'twitterID',
        ];
    }

    public function messages()
    {
        return [
            'user.name.required' => ':attributeを入力してください。',
            'user.name.min' => ':attributeは4文字以上で入力してください。',
            'user.name.max' => ':attributeは20文字以下で入力してください。',
            'user.profile.max' => ':attributeは200文字以下で入力してください。',
            'user.skima_id.max' => ':attributeは10文字以下で入力してください。',
            'user.twitter_id.max' => ':attributeは15文字以下で入力してください。',
        ];
    }
}