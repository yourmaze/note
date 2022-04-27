<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role', 10)->default('new');
            $table->unsignedInteger('time_zone')->default(3);
            $table->boolean('confirm')->default(false);
            $table->uuid('confirm_key')->nullable();
            $table->boolean('show')->default(false)->comment('User can show/hide name');
            $table->string('link')->nullable()->default(false)->comment('User can show name and make link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
