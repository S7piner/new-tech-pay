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
    Schema::create('employes', function (Blueprint $table) {

    $table->id();

    $table->foreignId('entreprise_id')
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

    $table->string('matricule')
          ->nullable();

    $table->string('nom');

    $table->string('prenom');

    $table->string('telephone')
          ->nullable();

    $table->string('email')
          ->nullable();

    $table->date('date_embauche')
          ->nullable();

    $table->decimal('salaire_base', 15, 2)
          ->default(0);

    $table->string('cnss')
          ->nullable();

    $table->string('cnamgs')
          ->nullable();

    $table->string('photo')
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
        Schema::dropIfExists('employes');
    }
};
