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
        Schema::table('rubriques', function (
            Blueprint $table
        ) {

            /*
            |--------------------------------------------------------------------------
            | ORDRE AFFICHAGE
            |--------------------------------------------------------------------------
            */

            $table->integer(
                'ordre_affichage'
            )->default(0);

            /*
            |--------------------------------------------------------------------------
            | FORMULE
            |--------------------------------------------------------------------------
            */

            $table->text(
                'formule'
            )->nullable();

            /*
            |--------------------------------------------------------------------------
            | PLAFOND
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'plafond',
                15,
                2
            )->nullable();

            /*
            |--------------------------------------------------------------------------
            | OBLIGATOIRE
            |--------------------------------------------------------------------------
            */

            $table->boolean(
                'obligatoire'
            )->default(false);

            /*
            |--------------------------------------------------------------------------
            | RUBRIQUE PARENT
            |--------------------------------------------------------------------------
            */

            $table->foreignId(
                'rubrique_parent_id'
            )

            ->nullable()

            ->constrained('rubriques')

            ->nullOnDelete();

        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::table('rubriques', function (
            Blueprint $table
        ) {

            $table->dropConstrainedForeignId(
                'rubrique_parent_id'
            );

            $table->dropColumn([

                'ordre_affichage',

                'formule',

                'plafond',

                'obligatoire',

            ]);

        });
    }
};
