<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加
use Illuminate\Support\Str; //追加
use DateTime; //追加
use Illuminate\Support\Facades\Hash; 

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            ['company_name' => "コカ・コーラ",
            'street_address' => "尾道市大田町",
            'representative_name'  => "玉田多摩美",
            'created_at' => new DateTime(),
             'updated_at' => new DateTime(),
            ],
            ['company_name' => "サントリー",
            'street_address' => "広島市大田町",
            'representative_name'  => "玉岡珠美",
            'created_at' => new DateTime(),
             'updated_at' => new DateTime(),
            ],
            ['company_name' => "キリン",
            'street_address' => "広島市大田町",
            'representative_name'  => "玉岡かんざぶろう",
            'created_at' => new DateTime(),
             'updated_at' => new DateTime(),
            ],
        ]);
    }
}
