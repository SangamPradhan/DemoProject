<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('region');
            $table->string('title');
            $table->text('description');
            $table->string('qualification');
            $table->integer('vacancy');
            $table->string('salary');
            $table->text('benefits')->nullable();
            $table->string('keyword');
            $table->timestamp('deadline');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
