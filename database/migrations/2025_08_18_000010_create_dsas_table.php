<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dsas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 15)->unique();
            $table->string('password')->nullable();
            $table->string('company_name')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('dsas'); }
};
