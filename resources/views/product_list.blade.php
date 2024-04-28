@extends('layouts.app')
@push(`styles`)  
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"
@endpush
@section('content')


<div class="container">
    <section class="list">
        <h1 >商品一覧画面</h1>
      
        <form action="{{route('product_list')}}" method="GET">
            @csrf
            <label>検索フォーム
            <input type="text" name="keyword" placeholder="検索キーワード">
            <select name="companyKeyword">
                <option value="" name="companyKeyword">メーカー名</option>
                @foreach ($products as $product)
                <option value="{{$product -> company_id}}" name="companyKeyword">{{$product -> company_name}}</option>
                @endforeach
            </select>
            <button type="submit" value="検索">検索</button>
        </label>
        </form> 
    
            <table>
                <tr>
                    <th>ID</th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>メーカー名</th>
                    <th></th>
                    <th></th>
                    <th >
                    <a href="{{route('product_create')}}" class="register">新規登録</a>
                    </th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{$product -> id}}</td>
                    <td><img src="{{ asset($product->img_path) }}" class="img" ></td>
                    <td>{{$product -> product_name}}</td>
                    <td>{{$product -> price}}</td>
                    <td>{{$product -> stock}}</td>
                    <td>{{$product -> company_name}}</td>
                    <td><a href="{{route('product_detail',$product->id)}}" class="btn">詳細</a></td>
                    <form action="{{route('product_delete',['id' => $product->id])}}" method="POST" '>
                        @csrf
                    <td ><button type="submit" class="btn" >削除</button></td>
                    </form>
                    
                </tr>
                @endforeach
            </table>
        </section>
@endsection
<!-- もともとはhome.balde.php
 -->