<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ComplaintController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | USER SUBMIT TICKET
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'urgency' => 'required|string|max:50',
            'message' => 'required|string'
        ]);

        Complaint::create([
            'user_id' => Auth::id(),

            // USER INFO
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,

            // TICKET
            'topic' => $request->topic,
            'urgency' => $request->urgency,
            'message' => $request->message,

            // STATUS
            'status' => 'Open'
        ]);

        return redirect('/kontak')->with(
            'success',
            'Tiket konsultasi berhasil dikirim.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $complaints = Complaint::latest()->get();

        return view('admin.keluhan', compact(
            'complaints'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | PROCESS TICKET
    |--------------------------------------------------------------------------
    */

    public function process($id)
    {
        $complaint = Complaint::findOrFail($id);

        $complaint->update([
            'status' => 'Process'
        ]);

        return back()->with(
            'success',
            'Ticket sedang diproses.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RESOLVE TICKET
    |--------------------------------------------------------------------------
    */

    public function resolve($id)
    {
        $complaint = Complaint::findOrFail($id);

        $complaint->update([
            'status' => 'Resolved'
        ]);

        return back()->with(
            'success',
            'Ticket berhasil diselesaikan.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE TICKET
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);

        $complaint->delete();

        return back()->with(
            'success',
            'Ticket berhasil dihapus.'
        );
    }

        public function downloadPdf()
    {
        $complaints = Complaint::with('user')
            ->latest()
            ->get();

        $pdf = Pdf::loadView('admin.pdf.complaints-pdf', compact('complaints'));

        return $pdf->download('laporan-keluhan-user.pdf');
    }
}
