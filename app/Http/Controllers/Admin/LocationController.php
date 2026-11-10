<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $locations = Location::get();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {

        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image',
            'name.*' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address.*' => 'required|string',

        ]);



        unset($data['imgs']);
        $fileName = Helper::storeImage($request->file('image'), 'locations');
        $data['image'] = $fileName;
        Location::create($data);




        return redirect()->route('locations.index');
    }
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'image' => 'image',
            'name.*' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address.*' => 'required|string',


        ]);



        $location = Location::findOrFail($id);

        if ($request->hasFile('image')) {
            $fileName = Helper::updateImage($request->file('image'), $location->image, 'locations');
            $data['image'] = $fileName;
        }
        $location->update($data);




        return redirect()->route('locations.index');
    }
    public function destroy(Request $request, $id)
    {
        $location = Location::findOrFail($request->id);

        $oldImage = $location->image;
        Helper::deleteImage($oldImage);




        $location->delete();
        return back();
    }
}
