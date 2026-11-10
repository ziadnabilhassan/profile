<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'desc')->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.galleries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image',
            'title'=>'required',
            //   'category_id'=>'required'
        ]);
        $fileName = Helper::storeImage($request->file('image'), 'galleries');
        $data['image'] = $fileName;
        Gallery::create($data);
        return redirect()->route('galleries.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $categories = Category::all();

        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
            'title'=>'required',
            //   'category_id'=>'required'
        ]);
        unset($data['image']);
        $gallery = Gallery::findOrFail($id);
        if ($request->image) {
            $fileName = Helper::updateImage($request->file('image'), $gallery->image, 'galleries');
            $data['image'] = $fileName;
        }
        $gallery->update($data);
        return redirect()->route('galleries.index');
    }

    public function destroy(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($request->id);
        $oldImage = $gallery->image ?? '0';
        Helper::deleteImage($oldImage);
        $gallery->delete();
        return back();
    }
}
