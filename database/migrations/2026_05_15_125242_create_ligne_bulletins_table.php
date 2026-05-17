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
        Schema::create('ligne_bulletins', function (
            Blueprint $table
        ) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | BULLETIN
            |--------------------------------------------------------------------------
            */

            $table->foreignId(
                'bulletin_id'
            )->constrained()->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | RUBRIQUE
            |--------------------------------------------------------------------------
            */

            $table->foreignId(
                'rubrique_id'
            )->constrained()->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | LIBELLE
            |--------------------------------------------------------------------------
            */

            $table->string(
                'libelle'
            );

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
            | MONTANT
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'montant',
                15,
                2
            )->default(0);

            /*
            |--------------------------------------------------------------------------
            | TAUX
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'taux',
                10,
                2
            )->nullable();

            /*
            |--------------------------------------------------------------------------
            | QUANTITE
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'quantite',
                10,
                2
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
            'ligne_bulletins'
        );
    }
};
