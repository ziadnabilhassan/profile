<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Qualities;
use Illuminate\Http\Request;

class QualitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $qualities = Qualities::orderBy('id', 'desc')->get();
        return view('admin.qualities.index', compact('qualities'));
    }

    public function create()
    {
        return view('admin.Qualities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image'=>'required | image',

            'text.*' => 'required|string|min:3',
            'title.*' => 'required|string|min:3',
        ]);

  unset($data['imgs']);
        $fileName = Helper::storeImage($request->file('image'), 'qualities');
        $data['image'] = $fileName;
        Qualities::create($data);
        return redirect()->route('qualities.index');

    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $quality = Qualities::findOrFail($id);
        return view('admin.qualities.edit', compact('quality'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
   'image'=>'image',
            'text.*' => 'required|string|min:3',
            'title.*' => 'required|string|min:3',
        ]);

      $quality = Qualities::findOrFail($id);
           if ($request->hasFile('image')) {
                $fileName = Helper::updateImage($request->file('image'), $quality->image, 'qualities');
                $data['image'] = $fileName;
            }


        $quality->update($data);
        return redirect()->route('qualities.index');
    }

    public function destroy(Request $request, $id)
    {
        $quality = Qualities::findOrFail($request->id);


        $quality->delete();
        return back();
    }
}
