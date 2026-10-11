<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index(Request $request)
    {
        $query = Plant::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_populer', 'like', '%' . $request->search . '%')
                    ->orWhere('nama_latin', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        $plants = $query->latest()->get();

        return view('admin.tanaman', [
            'plants' => $plants,
            'total' => Plant::count()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_populer' => 'required',
            'nama_latin' => 'required',
            'kategori' => 'required',
            'tingkat_kesulitan' => 'required',
        ]);

        $cover = null;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')
                ->store('plants', 'public');
        }

        Plant::create([
            'nama_populer' => $request->nama_populer,
            'nama_latin' => $request->nama_latin,
            'kategori' => $request->kategori,
            'tingkat_kesulitan' => $request->tingkat_kesulitan,
            'status_ai' => $request->status_ai,
            'cover' => $cover
        ]);

        return back()->with('success', 'Flora berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Plant::findOrFail($id)->delete();

        return back();
    }
}
