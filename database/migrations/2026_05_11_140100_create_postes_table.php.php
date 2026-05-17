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
    Schema::create('postes', function (Blueprint $table) {

        $table->id();

        $table->foreignId('entreprise_id')
              ->constrained()
              ->onDelete('cascade');

        $table->string('nom');

        $table->text('description')
              ->nullable();

        $table->decimal('salaire_base', 15, 2)
              ->default(0);

        $table->boolean('statut')
              ->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postes');
    }
};
