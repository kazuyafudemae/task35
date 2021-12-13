@extends('layouts.item')

@section('title', 'Items')

@section('menubar')
@parent
(管理者側)商品情報追加ページ
@endsection

@section('content')
<table>
<tr><th>商品名</th><th>商品説明</th><th>値段</th><th>在庫数</th></tr>
<tr>
<form method="POST" action="{{ route('item.register') }}">
{{ csrf_field() }}
<td><input type="text" name="name"></td>
<td><input type="text" name="explanation"></td>
<td><input type="text" name="price"></td>
<td><input type="text" name="stock"></td>
</tr>
</table>
<input type='submit' value='登録'>
</form>


@if ($errors->count())
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif
@endsection

