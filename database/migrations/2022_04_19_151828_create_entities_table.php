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
        Schema::create('entities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->tinyInteger('type')->default(1);
            $table->string('url')->nullable();
            $table->string('img')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->text('body_text')->nullable();
            $table->text('body')->nullable();
            $table->foreignUuid('user_id')->constrained('users');
            $table->boolean('private')->default(true);
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
};
