<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMempershipsTable extends Migration
{
    public function up()
    {
        Schema::create('memperships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('third_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('identity_num')->nullable();
            $table->string('identity_from')->nullable();
            $table->date('identity_date')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('street')->nullable();
            $table->string('address')->nullable();
            $table->string('qualification')->nullable();
            $table->string('job')->nullable();
            $table->string('job_company')->nullable();
            $table->string('other_jobs')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('postal_box')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('email')->nullable();
            $table->boolean('certificate_sent')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}