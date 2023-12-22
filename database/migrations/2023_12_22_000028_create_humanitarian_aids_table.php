<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanitarianAidsTable extends Migration
{
    public function up()
    {
        Schema::create('humanitarian_aids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->integer('aid_number');
            $table->string('unit_of_aid');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}