<?php

namespace App\Http\Controllers\Address;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;

class RegisterController extends Controller
{
	public function showRegisterForm()
	{
		return view('Address.register');
	}

	public function register(AddressRequest $request)
	{
		return view('Address.register');
	}

	protected function create(array $data)
	{
		return Address::create([
			'postal_code' => $data['postal_code'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}
}

