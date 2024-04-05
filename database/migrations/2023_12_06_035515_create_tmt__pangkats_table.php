<?php

use App\Models\Pangkat;
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
        Schema::create('tmt_pangkats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pegawai::class, 'pegawai_id');
            $table->foreignIdFor(Pangkat::class, 'pangkat_id');
            $table->date('tmt_pangkat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tmt_pangkats');
    }
};
