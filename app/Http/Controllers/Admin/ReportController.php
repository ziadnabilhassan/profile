<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::orderBy('id', 'desc')->get();
        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {

        return view('admin.reports.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => 'file',

            'name.*' => 'required|string',
            'description.*' => 'required|string',



        ]);





        unset($data['imgs']);
        $fileName = Helper::storeImage($request->file('file'), 'reports');
        $data['file'] = $fileName;



        Report::create($data);
        return redirect()->route('reports.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);

        return view('admin.reports.edit', compact('report'));
    }

    public function update(Request $request, report $report)
    {
        $data = $request->validate([
           'file' => 'file',


            'name.*' => 'required|string',
            'description.*' => 'required|string',

        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('file')) {
                $fileName = Helper::updateImage($request->file('file'), $report->file, 'reports');
                $data['file'] = $fileName;
            }



            // Update report details
            $report->update($data);



            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

        return redirect()->route('reports.index')->with('success', 'report updated successfully.');
    }
    public function destroy(Request $request, $id)
    {
        $report = Report::findOrFail($request->id);
        $oldImage = $report->image;
        Helper::deleteImage($oldImage);


        $report->delete();
        return back();
    }

}
