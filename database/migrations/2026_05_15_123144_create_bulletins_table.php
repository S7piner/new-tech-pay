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
        Schema::create('bulletins', function (
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
            | PERIODE
            |--------------------------------------------------------------------------
            */

            $table->foreignId(
                'periode_paie_id'
            )->constrained()->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | SALAIRES
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'salaire_base',
                15,
                2
            )->default(0);

            $table->decimal(
                'total_gains',
                15,
                2
            )->default(0);

            $table->decimal(
                'total_retenues',
                15,
                2
            )->default(0);

            $table->decimal(
                'brut',
                15,
                2
            )->default(0);

            $table->decimal(
                'net_a_payer',
                15,
                2
            )->default(0);

            /*
            |--------------------------------------------------------------------------
            | COTISATIONS
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'cnss',
                15,
                2
            )->default(0);

            $table->decimal(
                'cnamgs',
                15,
                2
            )->default(0);

            $table->decimal(
                'irpp',
                15,
                2
            )->default(0);

            /*
            |--------------------------------------------------------------------------
            | STATUT
            |--------------------------------------------------------------------------
            */

            $table->enum('statut', [

                'brouillon',

                'valide',

                'paye',

            ])->default('brouillon');

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
            'bulletins'
        );
    }
};
