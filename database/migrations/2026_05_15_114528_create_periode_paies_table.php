<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */
    public function up(): void
    {
        Schema::create('periode_paies', function (
            Blueprint $table
        ) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | ENTREPRISE
            |--------------------------------------------------------------------------
            */

            $table->foreignId(
                'entreprise_id'
            )->constrained()->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | PERIODE
            |--------------------------------------------------------------------------
            */

            $table->string('mois');

            $table->year('annee');

            $table->string(
                'trimestre'
            )->nullable();

            /*
            |--------------------------------------------------------------------------
            | DATES
            |--------------------------------------------------------------------------
            */

            $table->date(
                'date_debut'
            );

            $table->date(
                'date_fin'
            );

            /*
            |--------------------------------------------------------------------------
            | STATUT
            |--------------------------------------------------------------------------
            */

            $table->enum('statut', [

                'ouverte',

                'en_validation',

                'cloturee',

            ])->default('ouverte');

            /*
            |--------------------------------------------------------------------------
            | OBSERVATION
            |--------------------------------------------------------------------------
            */

            $table->text(
                'observation'
            )->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(
            'periode_paies'
        );
    }
};
