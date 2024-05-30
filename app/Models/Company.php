<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

use Illuminate\Support\Facades\DB;

class Company extends Model

    {
        public function products() {
            return $this->hasMany('App\Models\Product');
        }
    
        public function getAllCompanies() {
    
            $companies = $this->all();
    
            return $companies;
        }
    }