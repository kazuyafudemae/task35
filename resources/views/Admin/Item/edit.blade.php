@extends('layouts.item')

@section('title', 'Items')

@section('menubar')
@parent
(管理者側)商品編集ページ
@endsection

@section('content')
<table>
<tr><th>商品名</th><th>商品説明</th><th>値段</th><th>在庫数</th></tr>
@foreach ($items as $item)
<tr>
<form method="POST" action="{{ route('admin.item.edit') }}">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ $item->id }}">
<td><input type="text" name="name" value="{{ $item->name }}"></td>
<td><input type="text" name="explanation" value="{{ $item->explanation }}"></td>
<td><p>{{ $item->price }}</p></td>
<td><input type="text" name="stock" value="{{ $item->stock }}"></td>
</tr>
@endforeach
</table>
<input type='submit' value='編集'>
</form>


@if ($errors->count())
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif
@endsection
