<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

use Illuminate\Support\Facades\DB;


class Product extends Model
{   
   
    use HasFactory;

    protected $fillable =[
        'product_name',
        'company_name',
        'price',
        'stock',
        'comment',
    ];
    

    
    // public function company(){
    //     return $this -> belongsTo(Company::class,'company_id', 'id');
    // }
    
//コーチと作成　productsテーブルのcompany_idとcompaniesテーブルのidをJOINしてデータを取得＊一覧画面用
    public function getList(){
        //productテーブルを全件取得して変数$productに代入
        $products = DB::table('products')
        ->join('companies','products.company_id','=','companies.id')
        ->select('products.*','companies.company_name')
        ->get();
        // dd($products);
        return $products;
    }
//コーチと作成　$idにデータをとってきたproduct.idのデータを入れて$productにかえす 詳細画面表示
    public function getDetail($id){
        $product =DB::table('products')
        ->join('companies','company_id','=','companies.id')
        ->select('products.*','companies.company_name')
        ->where('products.id','=',$id)
        ->first();
        return $product;

    }
    //検索処理
    public function SearchList($keyword,$companyKeyword,$minPrice,$maxPrice,$minStock,$maxStock){
        $query=DB::table('products')
        ->join('companies','products.company_id','=','companies.id')
        ->select('products.*','companies.company_name');
       //ここでgetしていた×！
     
        
        
        if(!is_null($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }
        if(!is_null($companyKeyword)){
            $query->where('company_id', '=', $companyKeyword);
        }
        if((!is_null($minPrice)) && (!is_null($maxPrice))) {
                    $query->whereBetween('price',[$minPrice, $maxPrice]);
                } elseif(!is_null($minPrice)) {
                    $query->where('price', '>=', $minPrice);
                } elseif(!is_null($maxPrice)) {
                    $query->where('price', '<=', $maxPrice);
        }

        if((!is_null($minStock)) && (!is_null($maxStock))) {
            $query->whereBetween('stock',[$minStock, $maxStock]);
        } elseif(!is_null($minStock)) {
            $query->where('stock', '>=', $minStock);
        } elseif(!is_null($maxStock)) {
            $query->where('stock', '<=', $maxStock);
        }
        //最後にgetにする！SQLみたいに順序はあるから!
    
        $products = $query->get();
        return $products; //controllerで呼び出した$productsに処理した結果を返している
    }

     // 登録処理
    public function registProduct($data,$img_path) {
        
    //productテーブルに新規登録insertが新規登録のための命令文・更新の際はupdate.
     //'カラム名'　=>登録する値　$data（入力された値）->viewのinputタグname属性
        DB::table('products')->insert([
            'product_name' => $data->product_name,
            'company_id' => $data->company_name,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
            'img_path' => $img_path
        ]);
    }

    // 更新処理
    public function updateProduct($data,$id) {
    
    DB::table('products')->where('id', $id)->update([
        'product_name' => $data->product_name,
        'company_id' => $data->company_name,
        'price' => $data->price,
        'stock' => $data->stock,
        'comment' => $data->comment,
        ]);
        }
}