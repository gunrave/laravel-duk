<?php

use App\Models\Pegawai;
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
        Schema::create('gapoks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pegawai::class, 'pegawai_id');
            $table->integer('nilai');
            $table->date('bulan/tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gapoks');
    }
};
