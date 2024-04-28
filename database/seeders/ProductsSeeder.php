<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加
use DateTime; //追加
use Illuminate\Support\Facades\Hash; 

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'company_id'=>1,
            'product_name'=> "コーラ",
            'price'=>"120",
            'stock'=>"10",
            'comment'=>"つめた～い",
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ],
            [
            'company_id'=>2,
            'product_name'=> "伊右衛門お茶",
            'price'=>"150",
            'stock'=>"3",
            'comment'=>"つめた～い",
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ],
         [  'company_id'=>3,
            'product_name'=> "水",
            'price'=>"110",
            'stock'=>"5",
            'comment'=>"つめた～い",
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ],
            ] );
            
    }
}
