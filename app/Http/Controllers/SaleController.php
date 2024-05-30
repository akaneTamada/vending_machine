<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product; // Productモデルを使用
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     *API通信　購入処理
     *
     * 
     */
    public function purchase(Request $request)
    {
        //リクエストから商品IDを取得
        $productId = $request-> input('product_id');
        //リクエストから購入個数を取得
        $quantity = $request-> input('quantity',1);

        //データベースから送られてきた商品情報と同じものを返す
        $product = Product::find($productId);

        //商品が存在しない場合・在庫が足りない場合
        if(!$product){
            return response()->json(['message'=>'商品がございません'],404);
        }
        if($product->stock < $quantity){
            return response()->json(['message'=>'在庫がありません'],400);
        }
        
        //在庫を減少させる
        $product->stock -=$quantity;
        $product->save();

        //Saleテーブルに商品IDと購入日時を登録
        $sale = new Sale([
            'product_id'=>$productId
        ]);

        $sale ->save();
        //レスポンスを返す
        return response()->json(['message','購入成功！']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
