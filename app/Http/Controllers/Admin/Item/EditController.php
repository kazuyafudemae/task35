<?php
namespace App\Http\Controllers\Admin\Item;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemEditRequest;

class EditController extends Controller
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



    public function showEditForm(Request $request)
    {
		if (Item::find($request->id) !== null) {
			$items = Item::find($request);
			return view('Admin.Item.edit', ['items' => $items]);
		} else {
			$items = Item::all();
			return view('Admin.Item.index', ['items' => $items]);
		}
    }

	public function edit(ItemEditRequest $request)
	{
		if (Item::find($request->id) !== null) {
			$item = Item::find($request->id);
			$item->fill($request->except('id', 'price'));
			$item->save();
			$items = [$item];
			return view('Admin.Item.detail', ['items' => $items]);
		} else {
			$items = Item::all();
			return view('Admin.Item.index', ['items' => $items]);
		}
	}
}
