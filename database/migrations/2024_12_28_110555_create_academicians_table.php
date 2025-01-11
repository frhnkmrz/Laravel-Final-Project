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
        Schema::create('academicians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('position', ['Professor', 'Assoc Prof', 'Senior Lecturer', 'Lecturer']);
            $table->string('staff_number');
            $table->string('college');
            $table->string('department'); 
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
        Schema::table('academicians', function (Blueprint $table) {
            $table->dropColumn(['name', 'staff_number', 'email', 'college', 'department', 'position']);
        });
    }
};
