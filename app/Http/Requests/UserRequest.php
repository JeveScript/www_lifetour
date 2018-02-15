<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

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
            // 'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'name' => 'required|between:3,25|unique:users,name,' . Auth::id(),
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required|between:6,18',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => '用户名已被占用，请重新填写',
            'name.regex' => '用户名只支持中英文、数字、横杆和下划线。',
            'name.between' => '用户名必须介于 3 - 25 个字符之间',
            'name.required' => '用户名不能为空',
            'avatar.mimes' =>'头像必须是 jpeg, bmp, png, gif 格式的图片',
            'avatar.dimensions' => '图片的清晰度不够，宽和高需要 200px 以上',
            'email.unique' => '邮箱已被占用，请重新填写',
            'password.required' => '密码不能为空',
            'password.between' => '密码必须介于 6 - 18 个字符之间',
            'email.required' => '邮箱不能为空'
        ];
    }
}
