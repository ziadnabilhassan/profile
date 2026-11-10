<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $solutions = Solution::get();
        return view('admin.solutions.index', compact('solutions'));
    }

    public function create()
    {

        return view('admin.solutions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'name.*' => 'required|string',

        ]);







        Solution::create($data);




        return redirect()->route('solutions.index');
    }
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $solution = Solution::findOrFail($id);

        return view('admin.solutions.edit', compact('solution'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([

            'name.*' => 'required|string',


        ]);



        $solution = Solution::findOrFail($id);






        $solution->update($data);




        return redirect()->route('solutions.index');
    }
    public function destroy(Request $request, $id)
    {
        $solution = Solution::findOrFail($request->id);

        $solution->delete();
        return back();
    }
}
