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
        Schema::create('aboutmes', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->string('title_skill');
            $table->longText('description_skill');
            $table->string('color_skill');
            $table->string('logo_skill');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutmes');
    }
};
