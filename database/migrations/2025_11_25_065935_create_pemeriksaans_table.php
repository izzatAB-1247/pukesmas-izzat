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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id(); // primary key default
            $table->string('id_pemeriksaan')->unique();

            // Foreign keys
            $table->string('no_rm');
            $table->string('nip');
            $table->string('id_faskes');

            // Data pemeriksaan
            $table->date('tanggal');
            $table->text('keluhan')->nullable();
            $table->text('hasil')->nullable();

            $table->timestamps();

            // Relasi foreign key
            $table->foreign('no_rm')
                ->references('no_rm')
                ->on('pasiens')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('nip')
                ->references('nip')
                ->on('dokter')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_faskes')
                ->references('id_faskes')
                ->on('faskes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
