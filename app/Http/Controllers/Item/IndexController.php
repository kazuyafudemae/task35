<?php

namespace App\Http\Contrrollers\Item;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index() {
		$items = Item::all();
		return view('Item.index', ['items' => $items]);
	}


	public function detail(Request $request) {
		if (isset($request->id)) {
			$items = Item::find($request);
			return view('Item.detail', ['items' => $items]);
		} else {
			$items = Item::all();
			return view('item.index', ['items' => $items]);
		}
	}
}
