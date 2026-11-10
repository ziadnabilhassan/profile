<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;

use App\Models\Count;
use Illuminate\Http\Request;

class CountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $count = Count::orderBy('id', 'desc')->get();
        return view('admin.counts.index', compact('count'));
    }

    public function create()
    {
        return view('admin.counts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon'=>'required | image',

            'count' => 'required',
            'name.*' => 'required|string|min:3',
        ]);

  unset($data['imgs']);
        $fileName = Helper::storeImage($request->file('icon'), 'count');
        $data['icon'] = $fileName;
        Count::create($data);
        return redirect()->route('counts.index');

    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $count = Count::findOrFail($id);
        return view('admin.counts.edit', compact('count'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
  'icon'=>'  image',

            'count' => 'required',
            'name.*' => 'required|string|min:3',
        ]);

      $count = Count::findOrFail($id);
           if ($request->hasFile('icon')) {
                $fileName = Helper::updateImage($request->file('icon'), $count->icon, 'products');
                $data['icon'] = $fileName;
            }


        $count->update($data);
        return redirect()->route('counts.index');
    }

    public function destroy(Request $request, $id)
    {
        $count = Count::findOrFail($request->id);


        $count->delete();
        return back();
    }
}
