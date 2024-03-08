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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estate_id');
            $table->string('title');
            $table->string('product_code');
            $table->string('brand');
            $table->integer('unit_price');
            $table->integer('quantity');
            $table->date('register_at');
            $table->date('disposed_at');
            $table->integer('lifespan');
            $table->text('remark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
