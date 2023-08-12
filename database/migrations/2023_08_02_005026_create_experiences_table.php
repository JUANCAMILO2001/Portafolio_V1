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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->longText('cargo');
            $table->string('tipo_empleo');
            $table->longText('nombre_empresa');
            $table->string('ubicacion');
            $table->string('tipo_ubicacion');
            $table->date('date_init');
            $table->date('date_finish');
            $table->longText('description');
            $table->string('color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
