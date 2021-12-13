<?php
namespace App\Http\Controllers\Admin\Item;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
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
	public function __construct()
	{
		$this->middleware('auth:admin')->except('logout');
	}


	public function index() {
		$items = Item::all();
		return view('Admin.Item.index', ['items' => $items]);
	}


	public function detail(Request $request) {
		if (Item::find($request->id) !== null) {
			$items = Item::find($request);
			return view('Admin.Item.detail', ['items' => $items]);
		} else {
			$items = Item::all();
			return view('Admin.Item.index', ['items' => $items]);
		}
	}
}
