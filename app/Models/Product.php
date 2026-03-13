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
        'price',
        'height',
        'width',
        'length',
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

    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }

    /**
     * Get the formatted dimensions string (Height x Width x Length)
     */
    public function getDimensionsAttribute()
    {
        $dimensions = [];
        
        if ($this->width) {
            $dimensions[] = $this->width . 'w ';
        }
        if ($this->height) {
            $dimensions[] = $this->height . 'h ';
        }
        if ($this->length) {
            $dimensions[] = $this->length . 'l ';
        }
        
        return !empty($dimensions) ? implode(' x ', $dimensions) : null;
    }
}
