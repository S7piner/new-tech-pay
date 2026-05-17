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

            $table->date('date_naissance')
                  ->nullable();

            $table->string('sexe')
                  ->nullable();

            $table->string('situation_matrimoniale')
                  ->nullable();

            $table->integer('nombre_enfants')
                  ->default(0);

            $table->decimal('nombre_parts_irpp', 5, 2)
                  ->default(1);

            $table->text('adresse')
                  ->nullable();

            $table->string('ville')
                  ->nullable();

            $table->string('nationalite')
                  ->nullable();

            $table->string('contact_urgence')
                  ->nullable();

            $table->string('type_employe')
                  ->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employes', function (Blueprint $table) {

            $table->dropColumn([

                'date_naissance',

                'sexe',

                'situation_matrimoniale',

                'nombre_enfants',

                'nombre_parts_irpp',

                'adresse',

                'ville',

                'nationalite',

                'contact_urgence',

                'type_employe',

            ]);
        });
    }
};
