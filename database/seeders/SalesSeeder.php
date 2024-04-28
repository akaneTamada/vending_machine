<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加
use DateTime; //追加
use Illuminate\Support\Facades\Hash; 


class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
                [
                'product_id'=>1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ],
                [
                'product_id'=>2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ],
                [
                'product_id'=>3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ],
        ]);
    }
}
