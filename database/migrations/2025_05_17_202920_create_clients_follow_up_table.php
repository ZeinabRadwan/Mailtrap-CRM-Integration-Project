<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clients_follow_up', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name', 250)->nullable();
            $table->string('email', 191)->nullable();
            $table->timestamps(); // Optional
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('clients_follow_up');
    }
};
