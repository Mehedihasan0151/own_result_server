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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('roll')->index();
            $table->string('gpa1')->nullable();
            $table->string('gpa2')->nullable();
            $table->string('gpa3')->nullable();
            $table->string('gpa4')->nullable();
            $table->string('gpa5')->nullable(); 
            $table->text('ref_sub')->nullable(); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
