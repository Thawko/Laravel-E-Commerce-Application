<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
/*
    protected $fillable=[
        "category_id", "title", "status", "description","price","quantity","minquantity","tax","detail",
        'created_at',
        'updated_at'
    ];
    */
