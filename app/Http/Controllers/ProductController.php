<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('productType')->latest()->paginate(10);
        $productTypes = ProductType::all();
        return view('admin.products', compact('products', 'productTypes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_type_id' => 'required',
            'name' => 'required',
            'image' => 'nullable|image|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:5120',
        ]);


        $data = [
            'product_type_id' => $request->product_type_id,
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active'),
        ];

        // upload image ke public/assets/img
        if ($request->hasFile('image')) {

            $folder = public_path('assets/img');

            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }


            $filename = Str::uuid()
                .'_'.$request->file('image')->getClientOriginalName();


            $request->file('image')
                ->move($folder, $filename);


            $data['image'] = 'assets/img/'.$filename;
        }

        // upload pdf ke public/assets/pdf
        if ($request->hasFile('pdf')) {

            $folder = public_path('assets/pdf');


            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }


            $filename = Str::uuid()
                .'_'.$request->file('pdf')->getClientOriginalName();


            $request->file('pdf')
                ->move($folder, $filename);


            $data['pdf'] = 'assets/pdf/'.$filename;
        }

        Product::create($data);
        return redirect()
            ->route('products.index')
            ->with('success','Product berhasil ditambahkan');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_type_id'=>'required',
            'name'=>'required',
            'image'=>'nullable|image|max:2048',
            'pdf'=>'nullable|mimes:pdf|max:5120',
        ]);

        $data = [
            'product_type_id'=>$request->product_type_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'is_active'=>$request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {


            if ($product->image &&
                File::exists(public_path($product->image))) {

                File::delete(public_path($product->image));
            }

            $filename = Str::uuid()
                .'_'.$request->file('image')->getClientOriginalName();


            $request->file('image')
                ->move(public_path('assets/img'), $filename);


            $data['image'] = 'assets/img/'.$filename;
        }

        if ($request->hasFile('pdf')) {

            if ($product->pdf &&
                File::exists(public_path($product->pdf))) {

                File::delete(public_path($product->pdf));
            }

            $filename = Str::uuid()
                .'_'.$request->file('pdf')->getClientOriginalName();

            $request->file('pdf')
                ->move(public_path('assets/pdf'), $filename);

            $data['pdf'] = 'assets/pdf/'.$filename;
        }

        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('success','Product berhasil diupdate');
    }


    public function destroy(Product $product)
    {

        if ($product->image &&
            File::exists(public_path($product->image))) {

            File::delete(public_path($product->image));
        }

        if ($product->pdf &&
            File::exists(public_path($product->pdf))) {

            File::delete(public_path($product->pdf));
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success','Product berhasil dihapus');
    }
}