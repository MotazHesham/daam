<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('website_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->longText('address');
            $table->longText('description')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('twitter')->nullable();
            $table->string('divorced_count')->nullable();
            $table->string('widow_count')->nullable();
            $table->string('child_count')->nullable();
            $table->string('unit_count')->nullable();
            $table->string('building_count')->nullable();
            $table->string('beneficiary_count')->nullable();
            $table->string('volunteer_count')->nullable();
            $table->string('hours_count')->nullable();
            $table->longText('chairman_description')->nullable();
            $table->longText('iskan_description')->nullable();
            $table->longText('iskan_terms')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
