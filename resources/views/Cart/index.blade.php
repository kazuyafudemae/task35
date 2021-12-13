@extends('layouts.cart')

@section('title', 'Items')

@section('menubar')
@parent
カート内一覧ページ
@endsection

@section('content')
<body>
@if ($carts->count() > 0)
<table>
<h1>カート内容</h1>
<tr style="background-color:#e3f0fb">
<th>商品名</th>
<th>購入数</th>
<th>価格</th>
<th>合計</th>
<th></th>
</tr>
@foreach ($carts as $cart)
<tr>
<td align="right">{{ $cart->item->name }}</td>
<td align="right">{{ $cart->quantity }}</td>
<td align="right">{{ $cart->item->price }}</td>
<td align="right">{{ $cart->sub_total }}</td>
<td><form method="post" action="{{ route('cart.delete') }}">
{{ csrf_field() }}
<input type="hidden" name="cart_id" value="{{ $cart->id }}">
<button type="submit">カートから削除</button>
</form></td>
</tr>
@endforeach
<td style="background-color:#f5f5f5">
@if (isset($subtotals) && isset($totals))
<td>合計: {{ $subtotals }}</td>
<td>税込: {{ $totals }}</td>
@endif
<td></td>
</td>
</table>
@else
<p>カートが空です</p>
@endif
@if (isset($true_message))
<p>{{ $true_message }} </p>
@elseif (isset($false_message))
<p>{{ $false_message }} </p>
@endif
</body>
@endsection

