<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dsa_commissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dsa_id');
            $table->unsignedBigInteger('loan_application_id');
            $table->decimal('commission_percent',5,2);
            $table->decimal('commission_amount',12,2);
            $table->enum('status',['pending','paid'])->default('pending');
            $table->date('paid_at')->nullable();
            $table->timestamps();

            $table->foreign('dsa_id')->references('id')->on('dsas')->onDelete('cascade');
            $table->foreign('loan_application_id')->references('id')->on('loan_applications')->onDelete('cascade');
        });
    }
    public function down(): void { Schema::dropIfExists('dsa_commissions'); }
};
