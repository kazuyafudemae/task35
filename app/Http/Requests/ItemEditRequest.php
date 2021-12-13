<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemEditRequest extends FormRequest
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
			'name' => ['required', 'max:190'],
			'explanation' => ['required', 'max:190'],
			'stock' => ['required', 'numeric', 'max:1000000', 'min:0'],
		];
	}

	public function messages()
	{
		return [
			'name.required' => '商品名が入力されていません',
			'name.max' => '商品名は190文字以内で入力してください',
			'explanation.required' => '商品説明が入力されていません',
			'explanation.max' => '商品説明は190文字以内で入力してください',
			'stock.required' => '在庫数が入力されていません',
			'stock.numeric' => '在庫数は半角数字で入力してください',
			'stock.max' => '在庫数は1000000以内で入力してください',
			'stock.min' => '在庫数は0以上で入力してください',
		];
	}

}
