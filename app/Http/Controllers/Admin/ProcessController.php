<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $process = Process::orderBy('id', 'desc')->get();
        return view('admin.process.index', compact('process'));
    }


    public function create()
    {
        return view('admin.process.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'date'=>'required',
            'text.*' => 'required|string|min:3',
            'title.*' => 'required|string|min:3',
        ]);


        Process::create($data);
        return redirect()->route('process.index');

    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $process = Process::findOrFail($id);
        return view('admin.process.edit', compact('process'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'date'=>'required',
            'text.*' => 'required|string|min:3',
            'title.*' => 'required|string|min:3',
        ]);

      $process = Process::findOrFail($id);



        $process->update($data);
        return redirect()->route('process.index');
    }

    public function destroy(Request $request, $id)
    {
        $process = Process::findOrFail($request->id);


        $process->delete();
        return back();
    }
}
