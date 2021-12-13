<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
			'postal_code' => ['required', 'numeric', 'digits:7'],
			'pre_name' => 'required',
			'city_name' => 'required',
			'block_name' => ['required', 'unique:addresses'],
			'tel_number' => ['required', 'numeric', 'digits_between:10,11'],
		];
	}

	public function messages()
	{
		return [
			'pastal_code.required' => '郵便番号が入力されていません',
			'pastal_code.disits:7' => '郵便番号は７桁で入力してください',
			'pre_name.required' => '住所の都道府県がが入力されていません',
			'city_name.required' => '住所の市区町村が入力されていません',
			'block_name.required' => '住所の町名番地が入力されていません',
			'block_name.unique:addresses' => 'その住所はすでに登録されています',
			'tel_number.required' => '電話番号が入力されていません',
			'tel_number.numeric' => '電話番号は半角数字で入力してください',
			'tel_number.digits_between:10,11' => '電話番号は10〜11桁の数字で入力してください',
		];
	}
}
