<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        $colors = Color::get();
        return view('admin.products.create', compact('categories', 'colors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
              'image' => 'image',

            'name.*' => 'required|string',
            'description.*' => 'required|string',
            'category_id' => 'required|exists:categories,id',

            'is_featured' => 'nullable|in:1',
        ]);





        unset($data['imgs']);
        $fileName = Helper::storeImage($request->file('image'), 'products');
        $data['image'] = $fileName;



 Product::create($data);
  return redirect()->route('products.index');
     }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        $colors = Color::get();
        return view('admin.products.edit', compact('product', 'categories', 'colors'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
              'image' => 'image',


            'name.*' => 'required|string',
            'description.*' => 'required|string',
            'category_id' => 'required|exists:categories,id',

            'is_featured' => 'nullable|in:1',
        ]);
        $data['is_featured'] = $data['is_featured'] ?? 0;
   try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $fileName = Helper::updateImage($request->file('image'), $product->image, 'products');
                $data['image'] = $fileName;
            }



            // Update product details
            $product->update($data);



            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
      public function destroy(Request $request, $id)
    {
        $product = Product::with('images')->findOrFail($request->id);
        $oldImage = $product->image;
        Helper::deleteImage($oldImage);

        // delete all image for this product
        foreach ($product->images as $image) {
            Helper::deleteImage($image->image);
        }
        $product->delete();
        return back();
    }
public function shoo(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Reset all to 0
    Product::query()->update(['shoo' => 0]);

    // Set the chosen one to 1
    $product->update(['shoo' => 1]);

    return redirect()->back();
}
public function getGenders($id)
{
    try {
        $category = Category::with('genders')->findOrFail($id);
        return response()->json($category->genders);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}
}
