<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('identity_num')->nullable();
            $table->string('marrige_status')->nullable();
            $table->string('needs_title')->nullable();
            $table->longText('needs')->nullable();
            $table->integer('age')->nullable();
            $table->string('status')->default('specialist');
            $table->date('date')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->longText('notes')->nullable();
            $table->longText('cancel_reason')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10001954')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
