<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
	public function index() {
		$items = Item::all();
		return view('item.index', ['items' => $items]);
	}

	public function detail(Request $request) {
		if (isset($request->id)) {
			$items = Item::find($request);
			return view('item.detail', ['items' => $items]);
		} else {
			$items = Item::all();
			return view('item.index', ['items' => $items]);
		}
	}
}
