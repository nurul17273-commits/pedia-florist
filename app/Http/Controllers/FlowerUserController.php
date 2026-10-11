<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class FlowerUserController extends Controller
{
    public function index(Request $request)
    {
        $query = Plant::query();

        // search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_populer', 'like', '%' . $request->search . '%')
                  ->orWhere('nama_latin', 'like', '%' . $request->search . '%');
            });
        }

        // kategori
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        $plants = $query->latest()->get();

        return view('jenis-bunga', compact('plants'));
    }
}
