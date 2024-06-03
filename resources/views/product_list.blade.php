@extends('layouts.app')
@push(`styles`)  
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')


<div  class="container" >
    <section class="list">
        <h1 >商品一覧画面</h1>
      
            <form id="search-form" action="{{route('product_list')}}" method="GET">
            @csrf 
            <label>検索フォーム
                    <input type="text" name="keyword" class="keyword" placeholder="検索キーワード">
                    <select name="companyKeyword">
                        <option value="" class="companyKeyword">メーカー名</option>
                        {{-- foreach($products as $product)で記述してしまっていたがそうすると商品登録されているメーカー名しか出てこないし登録されているだけメーカー名optionが増える --}}
                        @foreach ($companies as $company)
                        <option value="{{$company -> id }}" class="companyKeyword">{{$company -> company_name }}</option>
                        @endforeach
                    </select>
                    <div>
                        <input type="text" name="minPrice" id="minPrice" placeholder="最低価格">
                        <input type="text" name="maxPrice" id="maxPrice" placeholder="最高価格">
                    </div>
                    <div>
                        <input type="text" name="minStock" id="minStock" placeholder="最低在庫数">
                        <input type="text" name="maxStock" id="maxStock" placeholder="最高在庫数">
                    </div>
                    <button type="submit" value="検索" class="search">検索</button>
            </label>
        </form>  
    
            

            <table id="fav-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>メーカー名</th>
                    <th></th>
                    <th >
                    <a href="{{route('product_create')}}" class="register">新規登録</a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product -> id}}</td>
                    <td><img src="{{ asset($product->img_path) }}" class="img" ></td>
                    <td>{{$product -> product_name}}</td>
                    <td>{{$product -> price}}</td>
                    <td>{{$product -> stock}}</td>
                    <td>{{$product -> company_name}}</td>
                    <td><a href="{{route('product_detail',$product->id)}}" class="btn">詳細</a></td>
                    {{-- <form action="{{route('product_delete',['id' => $product->id])}}" method="POST" '>
                        @csrf
                    <td ><button type="submit" class="btn" >削除</button></td>
                    </form> --}}
                    <td>
                    @csrf
                    @method('DELETE')
                    <button data-product_id="{{ $product->id }}" type="submit" class="delete-btn">削除</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </section>
        
        {{-- <script>
            // ここから検索機能
            $(.search).on('click',function(){
                


            })




           // ここからフロント側の非同期処理 削除機能 トークン送信処理
            $.ajaxSetup({
                         headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                         });

//ここから非同期処理の記述
$(function() {
                
                //削除ボタンに"btn"クラスを設定しているため、ボタンが押された場合に開始されます
                             $('.btn-danger ').on('click', function() {
                               var deleteConfirm = confirm('削除してよろしいでしょうか？');
               //　メッセージをOKした時（true)の場合、次に進みます 
                                   if(deleteConfirm == true) {
                                     var clickEle = $(this)
               //$(this)は自身（今回は押されたボタンのinputタグ)を参照します
               //　"clickEle"に対して、inputタグの設定が全て代入されます
               
                                     var userID = clickEle.attr('data-user_id');
                //attr()」は、HTML要素の属性を取得したり設定することができるメソッドです
                //今回はinputタグの"data-user_id"という属性の値を取得します
                //"data-user_id"にはレコードの"id"が設定されているので
                // 削除するレコードを指定するためのidの値をここで取得します
               
                // .ajaxメソッドでルーティングを通じて、コントローラへ非同期通信を行います。
               //見本ではレコードを削除するコントローラへ通信を送るためにはweb.phpを参照すると
               //通信方法は"post"に設定し、URL（送信先）を'/destroy/{id}'にする必要があります
                                        
                             $.ajax({
                                type: 'POST',
                                url:'/delete/'+userID, //userID にはレコードのIDが代入されています
                                dataType: 'json',
                                data: {'id':userID},
                                         })
               //”削除しても良いですか”のメッセージで”いいえ”を選択すると次に進み処理がキャンセルされます
                           } else {
                                   (function(e) {
                                     e.preventDefault()
                                   });
                           };
                     });
               });
               //.ajaxメソッドではオプション（引数）を設定することで送信先（URL)や送信する変数を指定できます
               //type は　通信方式をGETもしくはPOSTから選択できます（デフォルトはGETです）
               //urlは送信先（URL)を指定します。ルーティングで設定しているURLになるよう文字列と変数を記述します
               //dataType はjavascriptからこれから送るデータの種類は何であるかを示します
               //json とは "JavaScript Object Notationの略"
               //json は javascriptのほかphpや多数の言語でも読み取れるフォーマットなので設定しておけばエラーが出ません
               
               //data はURL先（コントローラー）に渡す値です。今回は削除したいレコードの”id”を渡します。
               //dataの書き方は   
               //data:{'コントローラーのアクションで使う引数':jQueryから渡す変数}になります
               </script> --}}
        
@endsection

<!-- もともとはhome.balde.php
 -->