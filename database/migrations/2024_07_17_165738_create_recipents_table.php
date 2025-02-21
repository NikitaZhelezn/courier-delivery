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
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_first_name')->nullable(false);
            $table->string('recipient_last_name')->nullable(false);
            $table->string('recipient_middle_name')->nullable();
            $table->string('recipient_phone')->nullable(false);
            $table->string('recipient_email')->nullable(false);
            $table->string('recipient_address')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipients');
    }
};
