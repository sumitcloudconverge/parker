<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('loan_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_application_id');
            $table->string('document_type');
            $table->string('file_path');
            $table->enum('status',['pending','approved','rejected'])->default('pending');
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('loan_application_id')->references('id')->on('loan_applications')->onDelete('cascade');
        });
    }
    public function down(): void { Schema::dropIfExists('loan_documents'); }
};
