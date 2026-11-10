<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryType;
use App\Models\gender;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = gender::orderBy('id', 'desc')->get();
        $categories = Category::with(['categoryType'])->latest()->get();
        return view('admin.categories.index', compact('categories', 'genders'));
    }

    public function create()
    {
        $categoryTypes = CategoryType::get();
        $genders = gender::orderBy('id', 'desc')->get();
        return view('admin.categories.create', compact('categoryTypes', 'genders'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
            // 'icon' => 'nullable|image',
            'title.*' => 'required|string',
            'category_type_id' => 'nullable|exists:category_types,id',

        ]);





        if ($request->hasFile('image')) {
            $data['image'] = Helper::storeImage($request->file('image'), 'categories');
        }

        // if ($request->hasFile('icon')) {
        //     $data['icon'] = Helper::storeImage($request->file('icon'), 'categories');
        // }

        Category::create($data);




        return redirect()->route('categories.index');
    }
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $genders = gender::orderBy('id', 'desc')->get();
        $categoryTypes = CategoryType::get();
        return view('admin.categories.edit', compact('category', 'categoryTypes', 'genders'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
            // 'icon' => 'nullable|image',
            'title.*' => 'required|string',
            'category_type_id' => 'nullable|exists:category_types,id',

        ]);



        $category = Category::findOrFail($id);


        if ($request->hasFile('image')) {
            $data['image'] = Helper::updateImage(
                $request->file('image'),
                $category->image,
                'categories'
            );
        }
        // if ($request->hasFile('icon')) {
        //     $data['icon'] = Helper::updateImage(
        //         $request->file('icon'),
        //         $category->icon,
        //         'categories'
        //     );
        // }


        $category->update($data);




        return redirect()->route('categories.index');
    }
    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($request->id);
        Helper::deleteImage($category->image);
        $category->delete();
        return back();
    }
}
