<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Item;

class Cart extends Model
{
	use SoftDeletes; //ソフトデリート準備
	protected $fillable = ['user_id', 'item_id', 'quantity'];
	protected $table = 'carts';

	public function item() {
		//リレーション
		return $this->belongsTo('App\Item', 'item_id');
	}

	public function subtotal() {
		$result = $this->item->price * $this->quantity;
		return $result;
	}

	public function insert($item_id, $add_qty) {
		$item = Item::findOrFail($item_id);
		$qty = $item->stock;
		//在庫なしバリデーション
		if ($qty <= 0) {
			return false;
		}
		$cart = $this->firstOrCreate(['user_id' => Auth::id(), 'item_id' => $item_id], ['quantity' => 0]);
		DB::beginTransaction();
		try {
			$cart->increment('quantity', $add_qty);
			$item->decrement('stock', $add_qty);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			return false;
		}
		$cart->sub_total = $cart->quantity * $cart->item->price;
		$cart->save();
		return true;
	}

	public function delete_cart($cart_id) {
		$cart = Cart::find($cart_id);
		$item_id = optional($cart)->item_id;
		$item = Item::find($item_id);
		if (optional($cart)->user_id === Auth::id()) {
			DB::beginTransaction();
			try {
				$item_id = $cart->item_id;
				$qty = $cart->quantity;
				$cart->delete();
				$item = Item::find($item_id);
				$item->increment('stock', $qty);
				DB::commit();
				return true;
			} catch (Exception $e) {
				DB::rollback();
				return false;
			}
		}
	}
}


