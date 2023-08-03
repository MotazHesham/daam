<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerGuidesTable extends Migration
{
    public function up()
    {
        Schema::create('volunteer_guides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->boolean('published')->default(1)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
