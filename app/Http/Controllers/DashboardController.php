<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPlants = Plant::count();
        $totalUsers = User::count();

        // contoh data chart mingguan
        $chartData = [12, 19, 14, 25, 18, 30, 22];

        // contoh pesan masuk (kalau belum ada tabel contact)
        $totalMessages = 0;

        // contoh akurasi ai statis dulu
        $akurasiAi = 98.2;

        return view('admin.home', compact(
            'totalPlants',
            'totalUsers',
            'chartData',
            'totalMessages',
            'akurasiAi'
        ));
    }
}
