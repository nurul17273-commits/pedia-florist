<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::latest()->get();

        return view('jadwal', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plant' => 'required',
            'time' => 'required',
        ]);

        Schedule::create([
            'plant' => $request->plant,
            'time' => $request->time,
            'days' => json_encode($request->days),
            'volume' => '250ml'
        ]);

        return back()->with('success', 'Jadwal berhasil disimpan');
    }

    public function destroy($id)
    {
        Schedule::findOrFail($id)->delete();

        return back();
    }
}
