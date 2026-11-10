<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;

use App\Models\Download;
use App\Models\Downloadtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloads = Download::orderBy('id', 'desc')->get();
        return view('admin.downloads.index', compact('downloads'));
    }

    public function create()
    {
       $downloadtypes =Downloadtype::get();

        return view('admin.downloads.create', compact('downloadtypes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'image',
             'file' => 'file',

            'name.*' => 'required|string',

            'downloadtype_id' => 'required|exists:downloadtypes,id',


        ]);





        unset($data['imgs']);
        $fileName = Helper::storeImage($request->file('image'), 'downloads');
        $data['image'] = $fileName;
          $fileName = Helper::storeImage($request->file('file'), 'downloads');
        $data['file'] = $fileName;



        Download::create($data);
        return redirect()->route('downloads.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $download = Download::findOrFail($id);
       $downloadtypes =Downloadtype::get();

        return view('admin.downloads.edit', compact('download', 'downloadtypes'));
    }

    public function update(Request $request, download $download)
    {
        $data = $request->validate([
            'image' => 'image',
             'file' => 'file',


            'name.*' => 'required|string',

             'downloadtype_id' => 'required|exists:downloadtypes,id',


        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $fileName = Helper::updateImage($request->file('image'), $download->image, 'downloads');
                $data['image'] = $fileName;
            }
              if ($request->hasFile('file')) {
                $fileName = Helper::updateImage($request->file('file'), $download->file, 'downloads');
                $data['file'] = $fileName;
            }



            // Update download details
            $download->update($data);



            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

        return redirect()->route('downloads.index')->with('success', 'download updated successfully.');
    }
    public function destroy(Request $request, $id)
    {
        $download = Download::with('images')->findOrFail($request->id);
        $oldImage = $download->image;
        Helper::deleteImage($oldImage);


        $download->delete();
        return back();
    }

}
