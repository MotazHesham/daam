<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVolunteerTasksTable extends Migration
{
    public function up()
    {
        Schema::table('volunteer_tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('volunteer_id')->nullable();
            $table->foreign('volunteer_id', 'volunteer_fk_10191121')->references('id')->on('volunteers');
        });
    }
}
