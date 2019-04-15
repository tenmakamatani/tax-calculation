<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'create') {
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
            'date' => 'required|date_format:Y-m-d',
            'percent' => 'required|integer|min:1'
        ];
    }

    public function messages() {
        return [
            'date.required' => '日付欄を入力してください',
            'date.date_format' => '○○○○-××-□□の形式で入力してください',
            'percent.required' => '税率欄を入力してください',
            'percent.integer' => '税率欄には整数を入力してください',
            'percent.min' => '税率欄には1以上の整数入力してください'
        ];
    }
}
