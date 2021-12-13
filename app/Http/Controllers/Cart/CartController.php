<?php
namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Item;

class CartController extends Controller
{
	public function __construct(Cart $cart) {
		$this->cart = $cart;
		$this->middleware('auth:user');
	}

	private function totals($carts) {
		$result = $this->subtotals($carts) + $this->tax($carts);
		return $result;
	}

	private function tax($carts) {
		$result = floor($this->subtotals($carts) * 0.1);
		return $result;
	}

	private function subtotals($carts) {
		$result = 0;
		foreach ($carts as $cart) {
			$result += $cart->quantity * $cart->item->price;
		}
		return $result;
	}

	public function index() {
		$carts = Cart::where('user_id', Auth::id())->get();
		$subtotals = $this->subtotals($carts);
		$totals = $this->totals($carts);
		return view('Cart.index', compact('carts', 'totals', 'subtotals'));
	}

	public function add(Request $request) {
		if (Item::find($request->item_id) !== null) {
			$item_id = $request->input('item_id');
			if ($this->cart->insert($item_id, 1)) {
				$carts = Cart::where('user_id', Auth::id())->get();
				$subtotals = $this->subtotals($carts);
				$totals = $this->totals($carts);
				return view('Cart.index', compact('carts', 'totals', 'subtotals'))->with('true_message', 'カートに商品を追加しました');
			} else {
				$carts = Cart::where('user_id', Auth::id())->get();
				$subtotals = $this->subtotals($carts);
				$totals = $this->totals($carts);
				return view('Cart.index', compact('carts', 'totals', 'subtotals'))->with('false_message', '在庫数を超えた商品が追加されました');
			}
		} else {
			return redirect(route('home'));
		}
	}

	public function delete(Request $request) {
		if (Cart::find($request->cart_id) !== null) {
			$cart_id = $request->input('cart_id');
			if ($this->cart->delete_cart($cart_id)) {
				$carts = Cart::where('user_id', Auth::id())->get();
				$subtotals = $this->subtotals($carts);
				$totals = $this->totals($carts);
				return view('Cart.index', compact('carts', 'totals', 'subtotals'))->with('true_message', 'カート内の商品を削除しました');
			} else {
				$carts = Cart::where('user_id', Auth::id())->get();
				$subtotals = $this->subtotals($carts);
				$totals = $this->totals($carts);
				return view('Cart.index', compact('carts', 'totals', 'subtotals'))->with('false_message', 'カート内の商品を削除できませんでした');
			}
		} else {
			return redirect(route('home'));
		}
	}
}
