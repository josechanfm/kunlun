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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estate_id')->nullable();
            $table->foreignId('property_id')->nullable();
            $table->string('category');
            $table->string('title')->nullable();
            $table->integer('payable');
            $table->date('due_at')->nullable();
            $table->integer('paid')->nullable();
            $table->date('paid_at')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
