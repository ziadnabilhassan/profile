<?php


namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\gender;
use Illuminate\Http\Request;

class GenderController extends  Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = gender::orderBy('id', 'desc')->get();
        return view('admin.genders.index', compact('genders'));
    }

    public function create()
    {
        return view('admin.genders.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name.*' => 'required|string',
        ]);
        gender::create($data);
        return redirect()->route('genders.index');

    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $gender = gender::findOrFail($id);
        return view('admin.genders.edit', compact('gender'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name.*' => 'required|string',
        ]);
        $gender = gender::findOrFail($id);
        $gender->update($data);
        return redirect()->route('genders.index');
    }

    public function destroy(Request $request, $id)
    {
        $gender = gender::findOrFail($request->id);
        $gender->delete();
        return back();
    }
}
