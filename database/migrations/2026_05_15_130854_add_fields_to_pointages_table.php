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
        Schema::table('pointages', function (
            Blueprint $table
        ) {

            /*
            |--------------------------------------------------------------------------
            | TRANSPORT
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'transport',
                15,
                2
            )->default(0);

            /*
            |--------------------------------------------------------------------------
            | PRIME DIVERS
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'prime_divers',
                15,
                2
            )->default(0);

            /*
            |--------------------------------------------------------------------------
            | INDEMNITES
            |--------------------------------------------------------------------------
            */

            $table->decimal(
                'indemnite',
                15,
                2
            )->default(0);

            /*
            |--------------------------------------------------------------------------
            | JOURS TRAVAILLES
            |--------------------------------------------------------------------------
            */

            $table->integer(
                'jours_travailles'
            )->default(0);

        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::table('pointages', function (
            Blueprint $table
        ) {

            $table->dropColumn([

                'transport',

                'prime_divers',

                'indemnite',

                'jours_travailles',

            ]);

        });
    }
};
