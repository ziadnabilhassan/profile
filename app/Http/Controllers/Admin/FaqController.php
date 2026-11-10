<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Faq;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FaqController extends   Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {


        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([


            'name.*' => 'required|string',
            'description.*' => 'required|string',



        ]);









        Faq::create($data);
        return redirect()->route('faqs.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);


        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, faq $faq)
    {
        $data = $request->validate([


            'name.*' => 'required|string',
            'description.*' => 'required|string',



        ]);

        try {
            DB::beginTransaction();





            // Update faq details
            $faq->update($data);



            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

        return redirect()->route('faqs.index')->with('success', 'faq updated successfully.');
    }
    public function destroy(Request $request, $id)
    {
        $faq = Faq::findOrFail($request->id);



        $faq->delete();
        return back();
    }

}

