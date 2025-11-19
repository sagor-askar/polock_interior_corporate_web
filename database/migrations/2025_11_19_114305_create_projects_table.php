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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('project_type_id');
            $table->string('client_name');
            $table->string('location');
            $table->string('site_area')->nullable();
            $table->date('date_of_completion')->nullable();
            $table->integer('stage')->default(0)->comment('0=>Ongoing, 0=>Completed');
            $table->longText('description')->nullable();
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->integer('homepage_visibility')->default(1)->comment('1=>Yes, 0=>NO');
            $table->integer('visibility_order')->nullable();
            $table->integer('status')->default(1)->comment('1=>Active, 0=>Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
