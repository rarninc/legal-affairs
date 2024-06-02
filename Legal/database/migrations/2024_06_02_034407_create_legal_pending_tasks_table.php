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
        Schema::create('legal_pending_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('table_name', 255);
            $table->string('record_id', 255);
            $table->string('record_title', 255);
            $table->string('status', 50);
            $table->timestamp('created_at');
            $table->integer('progress_no')->default(0);
            $table->string('priority', 15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_pending_tasks');
    }
};
