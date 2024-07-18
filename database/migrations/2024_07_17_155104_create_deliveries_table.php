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
        //Can change the rec
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipient_id')->index();
            $table->unsignedBigInteger('post_id')->index();
            $table->string('post_delivery_id')->index();
            $table->string('package_type')->nullable(false);
            $table->decimal('package_width')->default(0.00);
            $table->decimal('package_height')->default(0.00);
            $table->decimal('package_length')->default(0.00);
            $table->decimal('package_weight')->default(0.00);
            $table->string('package_address')->nullable(false);
            $table->string('delivery_address')->nullable();
            $table->timestamps('delivered_at');
            $table->timestamps('received_at');
            $table->timestamps();

            $table->foreign('recipient_id')
                ->on('recipients')
                ->references('id');

            $table->foreign('post_id')
                ->on('delivery_offices')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
