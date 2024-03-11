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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estate_id');
            $table->integer('block')->nullable();
            $table->string('registration')->nullable();
            $table->string('contact')->nullable();
            $table->string('owner')->nullable();
            $table->integer('rooms')->nullable();
            $table->string('floor')->nullable();
            $table->string('unit')->nullable();
            $table->string('code')->nullable();
            $table->string('address')->nullable();
            $table->date('resident at')->nullable();
            $table->text('description')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
