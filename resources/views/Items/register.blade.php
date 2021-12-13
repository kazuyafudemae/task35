@extends('layouts.item')

@section('title', 'Items')

@section('menubar')
@parent
商品情報追加ページ
@endsection

@section('content')
<table>
<tr><th>商品名</th><th>商品説明</th><th>値段</th><th>在庫の有無</th></tr>
@foreach ($items as $item)
<tr>
<form method="POST" action="{{ route('item.register') }}">
<td><input type="text" name="name"></td>
<td><input type="text" name="explanation"></td>
<td><input type="text" name="price"></td>
<td><input type="text" name="stock"></td>
</tr>
@endforeach
<input type='submit' value='登録'>
</form>
</table>
@endsection
