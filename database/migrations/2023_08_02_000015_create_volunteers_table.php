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
            $table->string('password')->nullable();
            $table->string('phone_number');
            $table->string('interest')->nullable();
            $table->string('initiative_name')->nullable();
            $table->string('prev_experience')->nullable();
            $table->tinyInteger('approved')->default(0);
            $table->datetime('email_verified_at')->nullable(); 
            $table->string('remember_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
