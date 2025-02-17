<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   protected $table = 'products';
    protected $primaryKey='id';
    protected $fillable=[
        'name',
        'cat_id',
        'description',
        'price',
        'photo',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class , 'cat_id');
    }
}
