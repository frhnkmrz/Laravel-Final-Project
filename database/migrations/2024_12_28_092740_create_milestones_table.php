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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grant_id');
            $table->string('milestone_name');
            $table->date('target_completion_date');
            $table->string('deliverable');
            $table->string('status')->default('Pending');
            $table->text('remark')->nullable();
            $table->timestamps();

            $table->foreign('grant_id')->references('id')->on('grants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};

