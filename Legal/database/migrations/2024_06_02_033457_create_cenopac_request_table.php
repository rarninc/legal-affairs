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
        Schema::create('cenopac_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_name', 100);
            $table->string('position', 100);
            $table->string('purpose', 100);
            $table->string('originating_office', 100);
            $table->string('status', 20);
            $table->date('date_requested');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cenopac_request');
    }
};
