<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class ProductType extends Model
{
    /** @use HasFactory<\Database\Factories\ProductTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
