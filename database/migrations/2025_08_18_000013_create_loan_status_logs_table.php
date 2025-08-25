<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('loan_status_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_application_id');
            $table->unsignedBigInteger('changed_by')->nullable();
            $table->enum('status',['pending','in_review','approved','rejected']);
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('loan_application_id')->references('id')->on('loan_applications')->onDelete('cascade');
        });
    }
    public function down(): void { Schema::dropIfExists('loan_status_logs'); }
};
