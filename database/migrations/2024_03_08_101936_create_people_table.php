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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->nullable();
            $table->string('fullname');
            $table->string('doc_id')->nullable();
            $table->string('occupation')->nullable();
            $table->string('mobile')->nullable();
            $table->date('dob')->nullable();
            $table->char('gender',1)->nullable();
            $table->string('residency')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
