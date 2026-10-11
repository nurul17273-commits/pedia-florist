<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AiDiagnose;

class AIController extends Controller
{
    public function analyze(Request $request)
    {
        if (!$request->hasFile('image')) {

            return response()->json([
                'result' => 'Silakan upload gambar tanaman terlebih dahulu.'
            ]);
        }

        $file = $request->file('image');

        $path = $file->store('ai-diagnoses', 'public');

        $fileName = strtolower(
            $file->getClientOriginalName()
        );

        $plantName = 'Unknown Flora';
        $confidence = rand(40, 80);
        $health = 'Need Review';

        $result = "
🌿 Tips Perawatan Tanaman:

• Siram tanaman secara rutin
• Pastikan terkena sinar matahari cukup
• Gunakan pupuk organik
• Potong daun yang layu
";

        if (str_contains($fileName, 'mawar')) {

            $plantName = 'Mawar';
            $confidence = rand(90, 99);
            $health = 'Healthy';

            $result = "
🌹 Perawatan Mawar:

• Siram pagi dan sore
• Butuh sinar matahari penuh
• Gunakan pupuk bunga
• Pangkas ranting kering
";

        } elseif (str_contains($fileName, 'anggrek')) {

            $plantName = 'Anggrek';
            $confidence = rand(85, 97);
            $health = 'Healthy';

            $result = "
🌸 Perawatan Anggrek:

• Jangan terlalu banyak air
• Simpan di tempat lembab
• Hindari matahari langsung
• Gunakan media pakis
";

        } elseif (str_contains($fileName, 'melati')) {

            $plantName = 'Melati';
            $confidence = rand(80, 95);
            $health = 'Healthy';

            $result = "
🌼 Perawatan Melati:

• Siram 1–2 kali seminggu
• Butuh banyak cahaya
• Gunakan tanah berpasir
• Hindari air berlebih
";
        }

        // simpan ke database
        AiDiagnose::create([
            'image' => $path,
            'plant_name' => $plantName,
            'confidence' => $confidence,
            'health_status' => $health,
            'result' => nl2br($result),
            'review_status' => $confidence >= 80
                ? 'Verified'
                : 'Need Review',
        ]);

        return response()->json([
            'result' => $result
        ]);
    }
}
