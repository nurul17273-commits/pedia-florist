<?php

namespace App\Http\Controllers;

use App\Models\AiDiagnose;

class AdminAIController extends Controller
{
    public function index()
    {
        $diagnoses = AiDiagnose::latest()->get();

        // total scan
        $totalScans = $diagnoses->count();

        // rata-rata confidence
        $avgAccuracy = $diagnoses->avg('confidence') ?? 0;

        // jumlah perlu review
        $needReview = $diagnoses
            ->where('review_status', 'Need Review')
            ->count();

        return view('admin.AI', compact(
            'diagnoses',
            'totalScans',
            'avgAccuracy',
            'needReview'
        ));
    }
}
