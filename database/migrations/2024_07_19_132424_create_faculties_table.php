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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->bigInteger('Salary_Faculty')->nullable();
            $table->foreignId('collage_id')->nullable()->constrained('collages','id')->nullOnDelete();
            $table->foreignId('Manger_id')->nullable()->constrained('users','id')->nullOnDelete();  
            $table->foreignId('building_id')->nullable()->constrained('buildings','id')->nullOnDelete();           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
