<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerTasksTable extends Migration
{
    public function up()
    {
        Schema::create('volunteer_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->longText('details')->nullable();
            $table->string('visit_type');
            $table->date('date');
            $table->time('arrive_time')->nullable();
            $table->time('leave_time')->nullable();
            $table->string('status')->default('pending');
            $table->longText('cancel_reason')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
