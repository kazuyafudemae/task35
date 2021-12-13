@extends('layouts.item')

@section('title', 'Items')

@section('menubar')
@parent
商品情報編集ページ
@endsection

@section('content')
<table>
<tr><th>商品名</th><th>商品説明</th><th>値段</th><th>在庫の有無</th></tr>
@foreach ($items as $item)
<tr>
<form method="POST" action="{{ route('item.edit') }}">
<td><input type="text" name="name" value="{{ $item->name }}"></td>
<td><input type="text" name="explanation" value="{{ $item->explanation }"></td>
<td><input type="text" name="price" value="{{ $item->price }}"></td>
<td><input type="text" name="stock" value="{{ $item->stock }}"></td>
</tr>
@endforeach
<input type='submit' value='編集'>
</form>
</table>
@endsection
