<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// database/migrations/xxxx_create_plants_table.php

public function up(): void
{
    Schema::create('plants', function (Blueprint $table) {
        $table->id();
        $table->string('nama_populer');
        $table->string('nama_latin');
        $table->enum('kategori', [
            'indoor',
            'outdoor',
            'herbal'
        ]);

        $table->enum('tingkat_kesulitan', [
            'mudah',
            'sedang',
            'sulit'
        ]);

        $table->enum('status_ai', [
            'synced',
            'pending'
        ])->default('pending');

        $table->string('cover')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
