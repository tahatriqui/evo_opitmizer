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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('poids')->nullable();
            $table->string('capacite_godet')->nullable();
            $table->string('model_moteur')->nullable();
            $table->string('fabricant')->nullable();
            $table->string('puissance_nominal')->nullable();
            $table->string('dimension_contour')->nullable();
            $table->string('type_conduite')->nullable();
            $table->string('chassis')->nullable();
            $table->integer('poids_total')->nullable();
            $table->integer('charge_utile')->nullable();
            $table->integer('vitesse_max')->nullable();
            $table->string('profondeur_forage')->nullable();
            $table->string('diametere_max')->nullable();
            $table->integer('capacite_large')->nullable();
            $table->integer('couple_sortie')->nullable();
            $table->integer('capacite_nominal')->nullable();
            $table->integer('hauteur_levage_maximal')->nullable();
            $table->string('model')->nullable();
            $table->string('LH')->nullable();
            $table->string('modele_chasis')->nullable();
            $table->string('longeur_total')->nullable();
            $table->string('hauteur_total')->nullable();
            $table->string('logeur_deux_convoyeur')->nullable();
            $table->string('plaque_rampe')->nullable();
            $table->string('logueur_hors_tout')->nullable();
            $table->string('hauteur_max_travail')->nullable();
            $table->string('hauteur_max_platforme')->nullable();
            $table->string('portee_travail_max')->nullable();
            $table->string('charge_godet')->nullable();
            $table->integer('charge_nominal')->nullable();
            $table->integer('posse_max')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
