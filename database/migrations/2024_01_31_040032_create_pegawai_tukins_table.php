<?php

use App\Models\Pegawai;
use App\Models\Tukin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai_tukins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pegawai::class, 'pegawai_id');
            $table->foreignIdFor(Tukin::class, 'tukin_id');
            $table->integer('nominal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai_tukins');
    }
};
