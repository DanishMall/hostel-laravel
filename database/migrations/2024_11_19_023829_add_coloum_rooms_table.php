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
//        Schema::create('rooms', function (Blueprint $table) {
//            $table->foreignId('block_id')->constrained()->onDelete('cascade');
//            $table->foreignId('unit_id')->constrained()->onDelete('cascade');
//            $table->foreignId('floor_id')->constrained()->onDelete('cascade');
//            $table->enum('status', ['available', 'occupied', 'maintenance'])->default('available');
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
