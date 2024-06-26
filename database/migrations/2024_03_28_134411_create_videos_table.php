<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
           $table->string('path');
           $table->integer('user_id')->unsigned();
           $table->text('transcript')->nullable();
           $table->text('summary')->nullable();
           $table->integer(('score'))->nullable();
           $table->integer('job_id')->unsigned()->nullable();
           $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
