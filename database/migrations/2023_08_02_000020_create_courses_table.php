<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('trainer');
            $table->date('start_at');
            $table->date('end_at');
            $table->string('attend_type')->nullable();
            $table->string('certificate')->nullable();
            $table->boolean('published')->default(1)->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
