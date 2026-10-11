<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatAIController extends Controller
{
    public function chat(Request $request)
    {
        $message = strtolower(trim($request->message));

        $reply = $this->detectIntent($message);

        return response()->json([
            'reply' => $reply
        ]);
    }

    private function detectIntent($message)
    {
        // sapaan
        if (
            str_contains($message, 'halo') ||
            str_contains($message, 'hai') ||
            str_contains($message, 'assalamualaikum')
        ) {
            return 'Halo 🌿 Saya Dr. Aris AI. Ceritakan masalah tanamanmu, misalnya daun kuning, layu, hama, atau jenis tanaman.';
        }

        // terima kasih
        if (
            str_contains($message, 'makasih') ||
            str_contains($message, 'terima kasih')
        ) {
            return 'Sama-sama 🌱 Semoga tanamanmu sehat dan tumbuh subur.';
        }

        // ==========================
        // MAWAR
        // ==========================
        if (str_contains($message, 'mawar')) {

            if (
                str_contains($message, 'rawat') ||
                str_contains($message, 'merawat')
            ) {
                return 'Mawar 🌹 membutuhkan sinar matahari 6–8 jam per hari, penyiraman secukupnya, dan pupuk tinggi fosfor agar rajin berbunga.';
            }

            if (
                str_contains($message, 'kuning') ||
                str_contains($message, 'daun kuning')
            ) {
                return 'Daun mawar menguning biasanya karena terlalu banyak air atau kekurangan nutrisi. Coba cek kelembaban tanah.';
            }

            if (
                str_contains($message, 'layu')
            ) {
                return 'Mawar layu bisa disebabkan akar rusak, kurang air, atau panas berlebih. Periksa media tanam dan kondisi akar.';
            }

            return 'Apakah masalah mawar kamu tentang perawatan, daun kuning, layu, atau hama? 🌹';
        }

        // ==========================
        // ANGGREK
        // ==========================
        if (str_contains($message, 'anggrek')) {

            if (
                str_contains($message, 'rawat') ||
                str_contains($message, 'merawat')
            ) {
                return 'Anggrek cocok di tempat terang tetapi tidak langsung terkena matahari. Siram saat media mulai kering.';
            }

            if (
                str_contains($message, 'akar')
            ) {
                return 'Akar anggrek sehat biasanya hijau atau putih. Jika hitam dan lembek, kemungkinan busuk akar.';
            }

            return 'Apakah ingin tahu cara merawat anggrek atau masalah tertentu? 🌸';
        }

        // ==========================
        // HAMA
        // ==========================
        if (
            str_contains($message, 'hama') ||
            str_contains($message, 'kutu') ||
            str_contains($message, 'ulat')
        ) {
            return 'Jika ada hama 🐛, pisahkan tanaman dari yang lain. Gunakan neem oil, sabun insektisida ringan, atau bersihkan manual tergantung jenis hamanya.';
        }

        // ==========================
        // DAUN KUNING
        // ==========================
        if (
            str_contains($message, 'kuning')
        ) {
            return 'Daun kuning 🌿 biasanya disebabkan overwatering, kurang nutrisi, terlalu panas, atau stres lingkungan.';
        }

        // ==========================
        // LAYU
        // ==========================
        if (
            str_contains($message, 'layu')
        ) {
            return 'Tanaman layu 🥀 bisa terjadi karena kurang air, akar busuk, panas berlebih, atau serangan penyakit.';
        }

        // ==========================
        // PENYIRAMAN
        // ==========================
        if (
            str_contains($message, 'siram') ||
            str_contains($message, 'penyiraman')
        ) {
            return 'Penyiraman terbaik dilakukan pagi hari 🌤️. Gunakan finger test: cek kelembaban tanah sebelum menyiram.';
        }

        // fallback
        return 'Saya memahami pertanyaan tentang tanaman 🌿 Bisa dijelaskan lebih detail? Misalnya jenis tanaman, warna daun, kondisi batang, hama, atau penyiraman.';
    }
}
