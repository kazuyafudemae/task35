
	private function subtotals($carts) {
		$result = 0;
		foreach ($carts as $cart) {
			$result = $cart->quantity * $cart->item->price;
		}
		return $result;
	}
	private function totals($carts) {
		$result = $this->subtotals($carts) + $this->tax($carts);
		return $result;
	}
	private function tax($carts) {
		$result = floor($this->subtotals($carts) * 0.1);
		return $result;
	}
	public function add(Request $request) {
		$item_id = $request->input('item_id');
		if ($this->cart->insert($item_id, 1)) {
			return redirect(route('cart.index'))->with('true_message', '商品をカートに入れました。');
		} else {
			return redirect(route('cart.index'))->with('false_message', '在庫が足りません。');
		}
	}
	public function delete(Request $request) {
		$cart_id = $request->input('cart_id');
		return redirect(route('cart.index'))->with('true_message', 'カートから商品を削除しました。');
	}
