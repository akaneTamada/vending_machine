
@extends('layouts.app')
@push(`styles`)  
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"
@endpush
@section('content')

<h1>商品編集画面</h1>
<table>

    <tr>
        <th>ID</th>
        <td>{{$product -> id}}</td>
    </tr>
    <tr>
        <th>商品画像</th>
        <td><img src="{{ asset($product->img_path) }}" class="img" ></td>
    </tr>
    <tr>
        <th>商品名</th>
        <td>{{$product -> product_name}}</td>
    </tr> 
    <tr>
        <th>メーカー名</th>
        <td>{{$product -> company_name}}</td>
    </tr>
     <tr>
        <th>価格</th>
        <td>{{$product -> price}}</td>
    </tr>
    <tr>
        <th>在庫数</th>
        <td>{{$product -> stock}}</td>
    </tr>
    <tr>
        <th>コメント</th>
        <td>{{$product -> comment}}</td>
    </tr> 
    <tr>
        <td><a href={{route('product_edit',$product->id)}} class="btn">編集</a></td>
        <td><a href={{route('product_list')}} class="btn">戻る</a></td>   
    </tr>


</table>

@endsection
