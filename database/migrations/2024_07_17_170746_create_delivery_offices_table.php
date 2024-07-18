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
        Schema::create('delivery_offices', function (Blueprint $table) {
            $table->id();
            $table->string('post_name')->nullable(false);
            $table->string('post_subname')->nullable(false);
            $table->string('post_api_url')->nullable(false);
            $table->string('post_api_key')->nullable(false);
            $table->string('api_data_keys')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_offices');
    }
};
