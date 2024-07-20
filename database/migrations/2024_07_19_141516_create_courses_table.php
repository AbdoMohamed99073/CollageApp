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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('book_id')->nullable()->constrained('books','id')->nullOnDelete();
            $table->foreignId('teacher_id')->nullable()->constrained('teachers','id')->nullOnDelete();
            $table->foreignId('faculty_id')->nullable()->constrained('faculties','id')->nullOnDelete();
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
