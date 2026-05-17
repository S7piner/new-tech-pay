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
        Schema::create('pointages', function (
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
            | EMPLOYE
            |--------------------------------------------------------------------------
            */

            $table->foreignId(
                'employe_id'
            )->constrained()->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | DATE
            |--------------------------------------------------------------------------
            */

            $table->date('date');

            /*
            |--------------------------------------------------------------------------
            | HEURES
            |--------------------------------------------------------------------------
            */

            $table->time(
                'heure_arrivee'
            )->nullable();

            $table->time(
                'heure_depart'
            )->nullable();

            $table->decimal(
                'heures_normales',
                8,
                2
            )->default(0);

            /*
            |--------------------------------------------------------------------------
            | HEURES SUPPLEMENTAIRES
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'heures_supp_10',
                8,
                2
            )->default(0);

            $table->decimal(
                'heures_supp_30',
                8,
                2
            )->default(0);

            $table->decimal(
                'heures_supp_40',
                8,
                2
            )->default(0);

            $table->decimal(
                'heures_supp_70',
                8,
                2
            )->default(0);

            /*
            |--------------------------------------------------------------------------
            | RETARDS / ABSENCES
            |--------------------------------------------------------------------------
            */

            $table->integer(
                'retard_minutes'
            )->default(0);

            $table->boolean(
                'absence'
            )->default(false);

            /*
            |--------------------------------------------------------------------------
            | PRIMES
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'panier',
                15,
                2
            )->default(0);

            /*
            |--------------------------------------------------------------------------
            | OBSERVATION
            |--------------------------------------------------------------------------
            */

            $table->text(
                'observation'
            )->nullable();

            /*
            |--------------------------------------------------------------------------
            | STATUT
            |--------------------------------------------------------------------------
            */

            $table->string(
                'statut'
            )->default('présent');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(
            'pointages'
        );
    }
};
