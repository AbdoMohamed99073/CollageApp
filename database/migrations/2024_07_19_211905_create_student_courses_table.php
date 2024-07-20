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
        Schema::create('student_courses', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained('students','id')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses','id')->cascadeOnDelete();
            $table->timestamps();


            $table->primary(['student_id' , 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};
