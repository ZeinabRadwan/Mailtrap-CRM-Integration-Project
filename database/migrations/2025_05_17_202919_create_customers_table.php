<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('ar_name', 250)->nullable();
            $table->string('en_name', 250)->nullable();
            $table->string('email', 191)->nullable();
            $table->timestamps(); // Optional: adds created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
