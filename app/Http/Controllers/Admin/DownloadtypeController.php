<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Downloadtype;
use Illuminate\Http\Request;

class DownloadtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $downloadtypes = Downloadtype::get();
        return view('admin.downloadtypes.index', compact('downloadtypes'));
    }

    public function create()
    {

        return view('admin.downloadtypes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'name.*' => 'required|string',

        ]);

        Downloadtype::create($data);

        return redirect()->route('downloadtypes.index');
    }
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $downloadtype = Downloadtype::findOrFail($id);

        return view('admin.downloadtypes.edit', compact('downloadtype'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([

            'name.*' => 'required|string',


        ]);

        $downloadtype = Downloadtype::findOrFail($id);

        $downloadtype->update($data);

        return redirect()->route('downloadtypes.index');
    }
    public function destroy(Request $request, $id)
    {
        $downloadtype = Downloadtype::findOrFail($request->id);

        $downloadtype->delete();
        return back();
    }
}
