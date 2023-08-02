<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('identity_num');
            $table->string('email');
            $table->string('phone_number');
            $table->string('interest')->nullable();
            $table->string('initiative_name')->nullable();
            $table->string('prev_experience')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
