<?php

namespace App\Http\Controllers\Admin\Item;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;

class RegisterController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:admin')->except('logout');
	}


	public function showRegisterForm()
	{
		return view('Admin.Item.register');
	}

	public function register(ItemRequest $request)
	{
		$item = new Item;
		$item->name = $request->name;
		$item->explanation = $request->explanation;
		$item->price = $request->price;
		$item->stock = $request->stock;
		$item->save();

		/*
		return Item::create([
			'name' => $request['name'],
			'explanation' => $request['explanation'],
			'price' => $request['price'],
			'stock' => $request['stock'],
		]);
		 */

		$items = Item::all();
		return view('Admin.Item.index', ['items' => $items]);
	}
}

