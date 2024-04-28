@extends('layouts.app')
@push(`styles`)  
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"
@endpush
@section('content')
<h1>商品情報編集画面</h1>
<form action="{{route('product_update',['id' => $product->id])}}" method="POST" enctype='multipart/form-data'>

	@csrf

<table>
    {{-- 個々の変更大丈夫か --}}
    <tr>
        <td>ID</td>
        <td>{{$product ->id}}</td>
    </tr>
	
    <tr>
        <td class="required">商品名</td>
        <td><input type="text" name="product_name"></td>
    </tr>
    <tr>
        <td class="required">メーカー名</td>
        <td><select name="company_name">
                <option value="">選択してください</option>
                @foreach ($companies as $company)
                <option value="{{$company -> id}}">{{$company -> company_name}}</option>
                @endforeach
            </select></td>
    </tr>
    <tr>
        <td class="required">価格</td>
        <td><input type="text" name="price" placeholder="価格"></td>
    </tr>
    <tr>
        <td class="required">在庫数</td>
        <td><input type="text" name="stock" placeholder="在庫数"></td>
    </tr>
    <tr>
        <td>コメント</td>
        <td> <textarea  name="comment" placeholder="コメント"></textarea></td>
    </tr>
    <tr>
        <td name="img_path">商品画像</td>
        <td><input type="file" name="image"></td>
    </tr>
    <tr>
        <td>  <button type="submit" class="btn btn-default">更新</button></td>
        <td> 
            <a href={{route('product_detail',$product->id)}} class="btn">戻る</a></td>
    </tr>   
</table>
</form>

@endsection
