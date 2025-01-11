<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrantStaffTable extends Migration
{
    public function up()
    {
        Schema::create('grant_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grant_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grant_staff');
    }
}