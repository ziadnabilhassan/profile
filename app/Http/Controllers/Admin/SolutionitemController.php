<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\Solutionitem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SolutionitemController extends  Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solutionitems = Solutionitem::orderBy('id', 'desc')->get();
        return view('admin.solutionitems.index', compact('solutionitems'));
    }

    public function create()
    {
        $solutions = Solution::get();

        return view('admin.solutionitems.create', compact('solutions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'image',

            'name.*' => 'required|string',
            'description.*' => 'required|string',
            'solution_id' => 'required|exists:solutions,id',


        ]);





        unset($data['imgs']);
        $fileName = Helper::storeImage($request->file('image'), 'solutionitems');
        $data['image'] = $fileName;



        Solutionitem::create($data);
        return redirect()->route('solutionitems.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $solutionitem = Solutionitem::findOrFail($id);
        $solutions = Solution::get();

        return view('admin.solutionitems.edit', compact('solutionitem', 'solutions'));
    }

    public function update(Request $request, solutionitem $solutionitem)
    {
        $data = $request->validate([
            'image' => 'image',


            'name.*' => 'required|string',
            'description.*' => 'required|string',
            'solution_id' => 'required|exists:solutions,id',


        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $fileName = Helper::updateImage($request->file('image'), $solutionitem->image, 'solutionitems');
                $data['image'] = $fileName;
            }



            // Update solutionitem details
            $solutionitem->update($data);



            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

        return redirect()->route('solutionitems.index')->with('success', 'solutionitem updated successfully.');
    }
    public function destroy(Request $request, $id)
    {
        $solutionitem = Solutionitem::with('images')->findOrFail($request->id);
        $oldImage = $solutionitem->image;
        Helper::deleteImage($oldImage);


        $solutionitem->delete();
        return back();
    }

}
