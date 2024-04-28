<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;
    // public function products(){
    //     return $this ->hasMany(Product::class,'company_id', 'id');
    // }
    // // public function getList(){
    // //     //companyテーブルを全件取得して変数$companyに代入
    // //     $companies = DB::table('companies')
      
    // //     ->get();
    // //     return $companies;
    // }
}
