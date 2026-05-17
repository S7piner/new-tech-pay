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
        Schema::create('rubriques', function (
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
            | INFORMATIONS
            |--------------------------------------------------------------------------
            */

            $table->string('code')
                  ->nullable();

            $table->string('libelle');

            /*
            |--------------------------------------------------------------------------
            | TYPE
            |--------------------------------------------------------------------------
            */

            $table->enum('type', [

                'gain',

                'retenue',

            ]);

            /*
            |--------------------------------------------------------------------------
            | CALCUL
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'taux',
                8,
                2
            )->default(0);

            $table->decimal(
                'montant',
                15,
                2
            )->default(0);

            $table->string(
                'base_calcul'
            )->nullable();

            /*
            |--------------------------------------------------------------------------
            | REGLES PAIE
            |--------------------------------------------------------------------------
            */

            $table->boolean(
                'est_imposable_irpp'
            )->default(true);

            $table->boolean(
                'est_cotisable_cnss'
            )->default(true);

            $table->boolean(
                'est_cotisable_cnamgs'
            )->default(true);

            /*
            |--------------------------------------------------------------------------
            | COMPTABILITE
            |--------------------------------------------------------------------------
            */

            $table->string(
                'compte_comptable_debit'
            )->nullable();

            $table->string(
                'compte_comptable_credit'
            )->nullable();

            /*
            |--------------------------------------------------------------------------
            | DESCRIPTION
            |--------------------------------------------------------------------------
            */

            $table->text(
                'description'
            )->nullable();

            /*
            |--------------------------------------------------------------------------
            | STATUT
            |--------------------------------------------------------------------------
            */

            $table->boolean(
                'actif'
            )->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(
            'rubriques'
        );
    }
};
