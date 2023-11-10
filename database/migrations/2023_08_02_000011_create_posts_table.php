<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->date('date');
            $table->string('title');
            $table->string('writer')->nullable();
            $table->text('short_description')->nullable();
            $table->text('video_link')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('head_line')->default(0)->nullable();
            $table->boolean('published')->default(1)->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
