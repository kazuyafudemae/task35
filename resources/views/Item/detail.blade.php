@extends('layouts.userItem')

@section('title', 'Items')

@section('menubar')
@parent
Item詳細ページ
@endsection

@section('content')
<table>
<tr><th>商品名</th><th>商品説明</th><th>値段</th><th>在庫の有無</th><th></th></tr>
@foreach ($items as $item)
<tr>
<td>{{$item->name}}</td>
<td>{{$item->explanation}}</td>
<td>{{$item->price}}円</td>
@if ($item->stock >= 1 && isset($auth))
<td>
<form method="post" action="{{ route('cart.add') }}">
{{ csrf_field() }}
<input type="hidden" name="item_id" value="{{ $item->id }}">
<button type="submit">カートに追加</button>
</form>
</td>
@elseif ($item->stock >= 1)
<td>
<a href='{{route('login')}}'>ログインしてください</a>
</td>
@else
<td>在庫なし</td>
@endif
</tr>
@endforeach
</table>
@endsection
