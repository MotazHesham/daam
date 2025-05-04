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
        Schema::create('questionnaire_special_needs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('marige_status')->nullable();
            $table->string('relation')->nullable();
            $table->boolean('has_special_needs')->nullable();
            $table->string('age_range')->nullable();
            $table->string('special_need_education')->nullable();
            $table->string('special_need_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire_special_needs');
    }
};
