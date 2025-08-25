<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('commission_slabs', function (Blueprint $table) {
            $table->id();
            $table->enum('loan_type',['personal','home','car','education','business','gold','other']);
            $table->decimal('commission_percent',5,2)->default(0);
            $table->decimal('min_amount',12,2)->default(0);
            $table->decimal('max_amount',12,2)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('commission_slabs'); }
};
