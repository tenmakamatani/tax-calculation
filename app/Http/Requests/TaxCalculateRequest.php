<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxCalculateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == '/') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date_calculate' => 'required|date_format:Y-m-d',
            'money' => 'required|integer|min:1',
        ];
    }

    public function messages() {
        return [
            'date_calculate.required' => '日付欄を入力してください',
            'date_calculate.date_format' => '○○○○-××-□□の形式で入力してください',
            'money.required' => '金額入力欄に入力してください',
            'money.integer' => '金額入力欄には整数を入力してください',
            'money.min' => '金額入力欄には1以上の整数を入力してください'
        ];
    }
}
