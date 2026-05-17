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
        Schema::create('centres_cout', function (Blueprint $table) {

            $table->id();

            $table->foreignId('entreprise_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('nom');

            $table->string('code')
                  ->nullable();

            $table->string('type')
                  ->nullable();

            $table->string('responsable')
                  ->nullable();

            $table->string('telephone')
                  ->nullable();

            $table->string('email')
                  ->nullable();

            $table->string('localisation')
                  ->nullable();

            $table->decimal('budget', 15, 2)
                  ->default(0);

            $table->text('description')
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
        Schema::dropIfExists('centres_cout');
    }
};
