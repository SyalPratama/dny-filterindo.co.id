<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductType;
use Illuminate\Support\Str;

class ProductTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'oil purifier',
            'oil filter & filter element',
            'air inlet filter & compressor filter',
            'hepa/ulpa series',
            'dust collector',
        ];

        foreach ($types as $name) {
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
}