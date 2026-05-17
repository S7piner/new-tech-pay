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
        Schema::create('entreprises', function (Blueprint $table) {
    $table->id();

    $table->string('nom_entreprise');

    $table->string('sigle')->nullable();

    $table->string('activite')->nullable();

    $table->string('secteur')->nullable();

    $table->string('nif')->nullable();

    $table->string('cnss')->nullable();

    $table->string('cnamgs')->nullable();

    $table->string('telephone')->nullable();

    $table->string('email')->nullable();

    $table->string('ville')->nullable();

    $table->string('region')->nullable();

    $table->string('pays')->nullable();

    $table->text('adresse')->nullable();

    $table->string('logo')->nullable();

    $table->boolean('statut')->default(true);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
