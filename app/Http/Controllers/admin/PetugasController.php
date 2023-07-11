<?php

namespace App\Http\Controllers\admin;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    public function index(Request $request){
        return view('pages.admin.petugas.petugas', [
            'petugas' => Petugas::all()
        ]);
    }

    public function addPetugas() {
        return view('pages.admin.petugas.addPetugas');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama' => ['required', 'string'],
        ]);

        if(!$validated){
            return redirect()->route('admin.petugas.petugas')->with('error', 'validated failed!');
        }

        // Create Menu
        Petugas::Create([
            'nama' => $validated['nama'],
        ]);

        return redirect()->route('admin.petugas.petugas')->with('success', 'Created Successfully');

    }

    public function editPetugas($id) {
        $petugas = Petugas::whereId($id)->first();
        return view('pages.admin.petugas.editPetugas')->with('petugas', $petugas);
    }

    public function updatePetugas(Request $request, $id) {
        $petugas = Petugas::find($id);
        $validated = $request->validate([
            'nama' => ['required', 'string'],
        ]);
        $petugas->nama = $request->nama;
        $petugas->save();
        return redirect()->route('admin.petugas.petugas')->with('success', 'Update Successfully');
    }

    public function deletePetugas($id) {
        $petugas = Petugas::find($id);
        $petugas->delete();
        return redirect()->route('admin.petugas.petugas')->with('success', 'Delete Successfully');
    }
}
