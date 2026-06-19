<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'product_types';

    protected $fillable = [
        'slug',
        'name',
        'description',
    ];


    /**
     * Relasi ke products
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'product_type_id');
    }
}