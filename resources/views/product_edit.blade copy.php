@extends('layouts.app')
@push(`styles`)  
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"
@endpush
@section('content')
<h2>商品情報編集画面</h2>
<form action="{{route('product_update',['id' => $product->id])}}" method="POST" enctype='multipart/form-data'>

	@csrf
    <div>
        <input type="hidden" name="id" value="{{$product ->id}}">
    <label for="product_name">商品名
    <input type="text" name="product_name" ></label>

    </div>
    <div>
    <label name ="compeny_name">メーカー
    <select name="company_name">
        <option value="">選択してください</option>
        @foreach ($companies as $company)
        <option value="{{$company -> id}}">{{$company -> company_name}}</option>
        @endforeach

    </select>
    </label>
    </div>
    <div>
    <label for="price">価格
    <input type="text" name="price" ></label>
    </div>
    <div>
    <label for="stock">在庫数
    <input type="text" name="stock"></label>
    </div>
    <div>
    <label for="comment">コメント
    <textarea  name="comment" ></textarea></label>
    </div>
    
    {{-- <input type="file" name="img_path"> --}}
	<button type="submit" class="btn btn-default">更新</button>
    <a href={{route('product_detail',$product->id)}}>戻る</a>
</form>
@endsection
