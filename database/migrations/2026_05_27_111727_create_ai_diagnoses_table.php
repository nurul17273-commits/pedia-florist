<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_diagnoses', function (Blueprint $table) {
            $table->id();

            $table->string('image')->nullable();
            $table->string('plant_name');
            $table->integer('confidence')->default(0);
            $table->string('health_status');
            $table->longText('result');
            $table->string('review_status')->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_diagnoses');
    }
};
