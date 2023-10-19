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
        Schema::create('return_scans', function (Blueprint $table) {
            $table->id();
            $table->string('AWB');
            $table->string('AWB_2');
            $table->date('Date');
            $table->string('Courier');
            $table->string('Firm');
            $table->string('Action')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_scans');
    }
};
