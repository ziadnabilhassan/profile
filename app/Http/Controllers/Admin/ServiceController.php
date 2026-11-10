<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
           $categories = Category::get();
        return view('admin.services.create',compact('categories'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'image' => 'required|image',

            'text.*' => 'nullable|string|min:3',
            'title.*' => 'required|string|min:3',
            'category_id'=>'required'
        ]);
        $fileName = Helper::storeImage($request->file('image'), 'services');


         $data['image'] = $fileName;

        Service::create($data);
        return redirect()->route('services.index');

    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)

    {
        $service = Service::findOrFail($id);
           $categories = Category::get();
        return view('admin.services.edit', compact('service','categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'image' => 'nullable|image',


            'text.*' => 'nullable|string|min:3',
            'title.*' => 'required|string|min:3',
            'category_id'=>'required'
        ]);
        unset($data['image']);
        $service = Service::findOrFail($id);
        if ($request->image) {
            $fileName = Helper::updateImage($request->file('image'), $service->image, 'services');
            $data['image'] = $fileName;
        }


        $service->update($data);
        return redirect()->route('services.index');
    }

    public function destroy(Request $request, $id)
    {
        $blog = Service::findOrFail($request->id);
        $oldImage = $blog->image ?? '0';
        Helper::deleteImage($oldImage);
        $blog->delete();
        return back();
    }
}
