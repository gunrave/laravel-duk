<?php

use App\Models\Gapok;
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
        Schema::create('gapok_pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pegawai::class, 'pegawai_id');
            $table->foreignIdFor(Gapok::class, 'gapok_id');
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gapok_pegawais');
    }
};
