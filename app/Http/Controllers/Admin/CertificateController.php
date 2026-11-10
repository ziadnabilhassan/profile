<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Certificate;
use App\Models\Typecertificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
     public function index()
    {
        $certificate = Certificate::orderBy('id', 'desc')->get();
        $typecertificates = Typecertificate::get();
        return view('admin.certificate.index', compact('certificate', 'typecertificates'));
    }

    public function create()
    {
        $typecertificates = Typecertificate::get();
        return view('admin.certificate.create', compact('typecertificates'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
             'image' => 'required|image',
             'typecertificate_id' => 'required|exists:typecertificates,id',

            'title.*' => 'required|string|min:3',
        ]);
  $fileName = Helper::storeImage($request->file('image'), 'certificatees');
        $data['image'] = $fileName;

        Certificate::create($data);
        return redirect()->route('certificates.index');

    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        $typecertificates = Typecertificate::get();
        return view('admin.certificate.edit', compact('certificate', 'typecertificates'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
             'image' => 'image',
             'typecertificate_id' => 'required|exists:typecertificates,id',

            'title.*' => 'required|string|min:3',
        ]);

        $certificate = Certificate::findOrFail($id);
          if ($request->image) {
            $fileName = Helper::updateImage($request->file('image'), $certificate->image, 'certificates');
            $data['image'] = $fileName;
        }
        $certificate->update($data);
        return redirect()->route('certificates.index');
    }

    public function destroy(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($request->id);


        $certificate->delete();
        return back();
    }
}
