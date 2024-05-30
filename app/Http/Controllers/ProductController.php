<?php

namespace App\Http\Controllers;


use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

use App\Http\Requests\ArticleRequest;


class ProductController extends Controller
{
    /**
     * 商品一覧画面画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->input());
        //インスタンスを生成　コーチと作成この書き方絶対覚える
        $model = new Product();
        // $products = $model ->getList();
        // $companies=Company::all();
        // $companymodel = new Company();
        // $companies = $companymodel ->getList();
        //view側 name属性に設定したものを引数に入れてフォームに入力した値をRequestで取得
        
        $keyword = $request->input('keyword');
        $companyKeyword = $request ->input('companyKeyword');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $minStock = $request->input('minStock');
        $maxStock = $request->input('maxStock');
        $companies = DB::table('companies')->get();
        

        if(is_null($keyword)  && is_null($companyKeyword)){
            $products =$model ->getList();
            // dd('一覧');
        }else{
            $products =$model ->SearchList($keyword,$companyKeyword,$minPrice, $maxPrice, $minStock, $maxStock);
           
            // dd('検索');
        }
       

        //viewにインスタンスを渡す　productsテーブル内のデータがはいっている＄productsという変数をわたす
         return view('product_list', ['products' => $products,'companies'=>$companies,'keyword'=>$keyword,'companyKeyword'=>$companyKeyword]);
    }
    

    

    /**
     * 新規商品登録画面を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $companies=Company::all(); 
       return view('product_create',['companies' => $companies]);
      
    }

    /**
     *  商品情報新規登録の処理　
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //①画像ファイルの取得
        $image = $request->file('image');
	
        //②画像ファイルのファイル名を取得
        $file_name = $image->getClientOriginalName();

        //③storage/app/public/imagesフォルダ内に、取得したファイル名で保存
        $image->storeAs('public/images', $file_name);

        //④データベース登録用に、ファイルパスを作成
        $img_path = 'storage/images/' . $file_name;

    //     //モデルのインスタンス化
	// $model = new Product();
       
        DB::beginTransaction();
       
        try{ 
            //⑤モデルのregistArticle関数を呼び出し。
		  
          //モデルの登録処理の呼び出しモデルに登録しているregistProductの関数を呼び出す$requestにはviewで入力された値が入っているのでそれを渡すため
            $model = new Product();
             $model ->registProduct($request,$img_path);
             DB::commit();
             } catch(\Exception $e){

             DB::rollback();
            return back();
            }
    
     // 処理が完了したらproduct_createの画面ににリダイレクト
    return redirect(route('product_create'));
    }


    //商品一覧→商品詳細画面を表示　コーチと作成絶対おぼえる！！！！
    public function productDetail($id){
        $model = new Product();
        $product = $model ->getDetail($id);

        return view('product_detail',['product'=> $product]);
    }

    //検索処理
    public function search(Request $request){
    //     $companies=Company::all(); 
    //    return view('product_list',['companies' => $companies]);ここまでのかんぱにーの取得いらないの・・か？
    
            $keyword = $request->input('keyword');
            $companyKeyword = $request->input('companyKeyword');
            $minPrice = $request->input('minPrice');
            $maxPrice = $request->input('maxPrice');
            $minStock = $request->input('minStock');
            $maxStock = $request->input('maxStock');

            $products =new Product();
            // $companies = new Company();
            // $companies= $companies ->getCompanyList($keyword,$companyKeyword);
            $products = $products->SearchList($keyword,$companyKeyword,$minPrice,$maxPrice,$minStock,$maxStock);
            return response()->json([
                'products' => $products,
                // 'companies' => $companies,
            ]);

            // // 5.14 STEP8拡張のためコメントアウト
            // return view('product_list',['keyword'=>$keyword,'companyKeyword'=>$companyKeyword]);



    }




    // //削除処理 STEP7ver destroyのほうが良かった？
    // public function delete($id)
    // {   
    //     $product =Product::find($id);
    //     $product->delete();
    //     //  Product::destroy($id);
    //     // // レコードを削除
       
    //     return redirect(route('product_list'));
    // }
//削除処理 STEP8 拡張ver  destroyのほうが良かった？
    public function delete(Request $request) {
        // dd($request);
        $input = $request->all();
        // dd($input);
            DB::beginTransaction();
    
            try {
              $product = Product::find($input['product']); 
              $product->delete();
    
              DB::commit();
              return response()->json(['success' => true]);
              return redirect(route('product_list'));
    
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['success' => false, 'message' => '削除に失敗しました']);
            }
        }

    /**
     * 商品情報編集画面
     *引数はIDで指定
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $model = new Product();
            $product = $model ->getDetail($id);
            $companies=Company::all(); 
       
    
            return view('product_edit',['product'=> $product,'companies' => $companies]);
        
    
    }

    /**
     * 商品情報を更新し、商品一覧画面にリダイレクトする
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $inputs = $request->all();
        DB::beginTransaction();
        try{
            
            $model = new Product();
             $model ->registProduct($request,$id);
             DB::commit();
             } catch(\Exception $e){

             DB::rollback();
            return back();
            }
     // 処理が完了したらproduct_listの画面ににリダイレクト
    return redirect(route('product_list'));

        // $model = new Product();
        // $product = $model ->getDetail($id);
        // $companies=Company::all(); 

        // $product->product_name = $request->product_name;
        // // $companies->company_name = $request->company_name;
        // // $product->company_id = $request -> company_id;
        // // $product->company_id -> associate($companies);
        // $product->price = $request->price;
        // $product->stock = $request->stock;
        // $product->comment = $request->comment;
        // $product->save();

        // // 処理が完了したらproduct_listの画面ににリダイレクト
        // return to_route('product_list');
    }

    

     
    
}
