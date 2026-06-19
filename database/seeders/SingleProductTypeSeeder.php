<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductType;
use Illuminate\Support\Str;

class SingleProductTypeSeeder extends Seeder
{
    public function run(): void
    {
        $name = 'home';

        ProductType::updateOrCreate(
            [
                'slug' => Str::slug($name),
            ],
            [
                'name' => $name,
                'description' => null,
            ]
        );
    }
}