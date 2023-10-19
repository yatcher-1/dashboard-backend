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
        Schema::create('data_scans', function (Blueprint $table) {
            $table->id();
            $table->string('Portal');
            $table->string('Courier');
            $table->date('Date');
            $table->string('Firm');
            $table->string('Order_ID');
            $table->string('AWB');
            $table->string('Portal_SKU');
            $table->string('Qty');
            $table->string('Action')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_scans');
    }
};
