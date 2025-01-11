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
        Schema::create('grants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_leader_id');
            $table->string('grant_amount');
            $table->string('grant_provider');
            $table->string('project_title');
            $table->date('start_date');
            $table->integer('duration_months');
            $table->timestamps();

            $table->foreign('project_leader_id')->references('id')->on('academicians');
        });

        // Create a pivot table for grant and project members
        Schema::create('grant_project_member', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grant_id');
            $table->unsignedBigInteger('academician_id');
            $table->timestamps();

            $table->foreign('grant_id')->references('id')->on('grants')->onDelete('cascade');
            $table->foreign('academician_id')->references('id')->on('academicians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grant_project_member');
        Schema::dropIfExists('grants');
    }
};

