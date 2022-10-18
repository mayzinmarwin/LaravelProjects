<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function main_category_info(){
        return $this->belongsTo(MainCategory::class,'main_category_id');
    }
    public function category_info()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function related_products()
    {
        return $this->belongsToMany(Product::class);
    }
}
