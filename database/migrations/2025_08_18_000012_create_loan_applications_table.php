<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone', 15);
            $table->date('dob')->nullable();
            $table->enum('gender',['male','female','other'])->nullable();

            $table->string('aadhaar_number',20)->nullable()->unique();
            $table->string('pan_number',20)->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode',10)->nullable();

            $table->decimal('loan_amount',12,2);
            $table->enum('loan_type',['personal','home','car','education','business','gold','other'])->default('personal');
            $table->integer('tenure_months')->nullable();
            $table->decimal('annual_income',12,2)->nullable();

            $table->enum('employment_type',['salaried','self-employed','business','other'])->nullable();
            $table->string('company_name')->nullable();
            $table->string('designation')->nullable();

            $table->unsignedBigInteger('dsa_id')->nullable();
            $table->enum('status',['pending','in_review','approved','rejected'])->default('pending');

            $table->decimal('commission_percent',5,2)->default(0);
            $table->decimal('commission_amount',12,2)->default(0);

            $table->json('documents')->nullable();

            $table->timestamps();

            $table->foreign('dsa_id')->references('id')->on('dsas')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });
    }
    public function down(): void { Schema::dropIfExists('loan_applications'); }
};
