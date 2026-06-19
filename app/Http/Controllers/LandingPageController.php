<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    /**
     * Menampilkan halaman landing page dengan data produk.
     */
    public function index(): View
    {
        // Mengambil produk aktif yang memiliki tipe dengan slug 'home'
        $products = Product::where('is_active', true)
            ->whereHas('productType', function ($query) {
                $query->where('slug', 'home');
            })
            ->latest()
            ->get();

        return view('welcome', compact('products'));
    }

    public function products(): View
    {
        // Mengambil produk, mengecualikan kategori yang memiliki slug 'home'
        $products = Product::where('is_active', true)
            ->whereHas('productType', function ($query) {
                $query->where('slug', '!=', 'home');
            })
            ->with('productType')
            ->latest()
            ->get();

        // Mengambil kategori, mengecualikan slug 'home'
        $categories = ProductType::where('slug', '!=', 'home')->get();

        return view('products', compact('products', 'categories'));
    }


}