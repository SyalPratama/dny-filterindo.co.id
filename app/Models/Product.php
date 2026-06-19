<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'products';

    protected $fillable = [
        'product_type_id',
        'name',
        'image',
        'description',
        'pdf',
        'is_active',
    ];


    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Relasi ke product type
     */
    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}