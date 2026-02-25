<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_type_id',
        'name',
        'description',
        'material',
        'price',
        'size',
        'weight',
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
