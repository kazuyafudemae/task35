<?php
namespace App\Http\Controllers\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Item;

class ItemController extends Controller
{
	public function index() {
		$items = Item::all();
		return view('Item.index', ['items' => $items]);
	}

	public function detail(Request $request) {
		if (isset($request->id)) {
			$items = Item::find($request);
			return view('Item.detail', ['items' => $items, 'auth' => Auth::id()]);
		} else {
			$items = Item::all();
			return view('Item.index', ['items' => $items]);
		}
	}
}
