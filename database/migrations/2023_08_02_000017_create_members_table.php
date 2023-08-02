<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('name');
            $table->string('job')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('civial_registry')->nullable();
            $table->string('qualification')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
