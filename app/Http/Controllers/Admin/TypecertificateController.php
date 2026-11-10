<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Typecertificate;
use Illuminate\Http\Request;

class TypecertificateController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $typecertificates = Typecertificate::get();
        return view('admin.typecertificates.index', compact('typecertificates'));
    }

    public function create()
    {

        return view('admin.typecertificates.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'name.*' => 'required|string',

        ]);







        Typecertificate::create($data);




        return redirect()->route('typecertificates.index');
    }
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $typecertificate = Typecertificate::findOrFail($id);

        return view('admin.typecertificates.edit', compact('typecertificate'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([

            'name.*' => 'required|string',


        ]);



        $typecertificate = Typecertificate::findOrFail($id);



        $typecertificate->update($data);


        return redirect()->route('typecertificates.index');
    }
    public function destroy(Request $request, $id)
    {
        $typecertificate = Typecertificate::findOrFail($request->id);

        $typecertificate->delete();
        return back();
    }
}
