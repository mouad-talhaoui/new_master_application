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
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('nombre_d_etudiant');
            $table->integer('nombre_d_etudiant_actual')->default(0);
            $table->foreignId('filiere_id')->nullable()->constrained()->restrictOnDelete();;
            $table->boolean('isEnabled')->default(true); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rdvs');
    }
};
