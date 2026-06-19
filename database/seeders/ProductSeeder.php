<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductType;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            // OIL PURIFIER
            [
                'type' => 'oil-purifier',
                'name' => 'OIL PURIFIER',
                'image' => 'assets/img/Oil-Purifier.jpeg',
            ],

            // OIL FILTER
            [
                'type' => 'oil-filter-filter-element',
                'name' => 'OIL FILTER ELEMENT',
                'image' => 'assets/img/Oil-Filter-Filter-Element.jpeg',
            ],

            // AIR INLET
            [
                'type' => 'air-inlet-filter-compressor-filter',
                'name' => 'AIR INLET FILTER',
                'image' => 'assets/img/Air-Inlet-Filter-Compressor-Filter.jpeg',
            ],


            // HEPA / ULPA
            [
                'type' => 'hepaulpa-series',
                'name' => 'CLEAN PROCESS FILTER: E10 TO U17',
                'image' => 'assets/img/cleanfilter_1.png',
                'pdf' => 'assets/pdf/clean-filter.pdf',
            ],

            [
                'type' => 'hepaulpa-series',
                'name' => 'CLEAN PROCESS FILTER: E10 TO U17 (2)',
                'image' => 'assets/img/cleanfilter_2.png',
                'pdf' => 'assets/pdf/clean-filter.pdf',
            ],

            [
                'type' => 'hepaulpa-series',
                'name' => 'PRE-FILTERATION: G3 TO M5',
                'image' => 'assets/img/pre-filtration-768x737.png',
                'pdf' => 'assets/pdf/Pre-Filter.pdf',
            ],

            [
                'type' => 'hepaulpa-series',
                'name' => 'COMFORT FILTERS: M5 TO F9',
                'image' => 'assets/img/comfortfilter_1.png',
                'pdf' => 'assets/pdf/comfort-filter.pdf',
            ],

            [
                'type' => 'hepaulpa-series',
                'name' => 'COMFORT FILTERS: M5 TO F9 (2)',
                'image' => 'assets/img/comfortfilter_2.png',
                'pdf' => 'assets/pdf/comfort-filter.pdf',
            ],

            [
                'type' => 'hepaulpa-series',
                'name' => 'INDUSTRIAL MOLECULAR FILTRATION',
                'image' => 'assets/img/industrialmolecularfiltration.png',
                'pdf' => 'assets/pdf/industrial-molecular-filtration.pdf',
            ],

            [
                'type' => 'hepaulpa-series',
                'name' => 'GAS TURBINE FILTRATION',
                'image' => 'assets/img/gasturbinefiltration.png',
                'pdf' => 'assets/pdf/gas-turbine-filtration.pdf',
            ],


            // DUST COLLECTOR
            [
                'type' => 'dust-collector',
                'name' => 'DUST COLLECTOR',
                'image' => 'assets/img/dust-collectors.png',
            ],

        ];


        foreach ($products as $item) {

            $type = ProductType::where('slug', $item['type'])->first();

            if (!$type) {
                continue;
            }


            Product::updateOrCreate(
                [
                    'name' => $item['name'],
                ],
                [
                    'product_type_id' => $type->id,
                    'image' => $item['image'],
                    'pdf' => $item['pdf'] ?? null,
                    'description' => null,
                    'is_active' => true,
                ]
            );
        }
    }
}