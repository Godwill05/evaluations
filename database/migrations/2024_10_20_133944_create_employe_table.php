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
        Schema::create('employe', function (Blueprint $table) {
            $table->id('id_employe');
            $table->string('nom');
            $table->string('prenom');
            $table->string('mail_employe',)->unique();
            $table->unsignedBigInteger('id_service');

            //ajout de la clé etrangère
            $table->foreign('id_service')->references('id_service')->on('service')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employe');
    }
};
