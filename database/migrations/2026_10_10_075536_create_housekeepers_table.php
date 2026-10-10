<?php

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
Schema::create('housekeepers', function (Blueprint $table) {
    $table->id();
    $table->string('nama', 100);
    $table->string('no_hp', 15);
    $table->text('alamat')->nullable();
    $table->enum('shift', ['pagi', 'siang', 'malam']);
    $table->text('tugas_harian');
    $table->string('area_penanganan', 100);
    $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('housekeepers');
    }
};
