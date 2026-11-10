<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $supports = Support::get();
        return view('admin.supports.index', compact('supports'));
    }

    public function create()
    {

        return view('admin.supports.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'name.*' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'Contact.*' => 'required|string',

        ]);







        Support::create($data);




        return redirect()->route('supports.index');
    }
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
       $support = Support::findOrFail($id);

        return view('admin.supports.edit', compact('support'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([

            'name.*' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'Contact.*' => 'required|string',


        ]);



       $support = Support::findOrFail($id);






       $support->update($data);




        return redirect()->route('supports.index');
    }
    public function destroy(Request $request, $id)
    {
       $support = Support::findOrFail($request->id);

       $support->delete();
        return back();
    }
}
