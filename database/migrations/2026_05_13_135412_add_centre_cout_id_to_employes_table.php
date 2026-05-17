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
        Schema::table('employes', function (Blueprint $table) {

            $table->foreignId('centre_cout_id')
                  ->nullable()
                  ->constrained('centres_cout')
                  ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employes', function (Blueprint $table) {

            $table->dropForeign([
                'centre_cout_id'
            ]);

            $table->dropColumn(
                'centre_cout_id'
            );

        });
    }
};
