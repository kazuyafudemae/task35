<?php

namespace App\Http\Contrrollers\Admin\Item;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
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


    public function delete(Request $request)
    {
		if (isset($request->id)) {
			$data = Item::findOrFail($id);
			$data->delete();
			return view('Admin.Item.index');
		} else {
			$items = Item::all();
			return view('Admin.Item.index', ['items' => $items]);
		}
    }
}
