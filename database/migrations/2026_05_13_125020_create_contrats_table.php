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
        Schema::create('contrats', function (Blueprint $table) {

            $table->id();

            $table->foreignId('entreprise_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('employe_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('poste_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null');

            $table->foreignId('categorie_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null');

            $table->string('type_contrat');

            $table->decimal('salaire_base', 15, 2)
                  ->default(0);

            $table->date('date_debut');

            $table->date('date_fin')
                  ->nullable();

            $table->string('statut')
                  ->default('actif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
