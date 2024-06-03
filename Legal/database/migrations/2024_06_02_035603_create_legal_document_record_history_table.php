<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('legal_document_record_history', function (Blueprint $table) {
            $table->integer('id');
            $table->string('tracking_no', 20);
            $table->string('document_title', 100);
            $table->string('document_type', 100);
            $table->string('from_office', 100);
            $table->string('to_office', 100)->nullable();
            $table->date('date_released')->nullable();
            $table->date('date_received');
            $table->string('remarks', 255)->nullable();
            $table->string('progress_status', 5);
            $table->string('document_status', 50)->nullable();
            $table->string('action', 8);
            $table->integer('version');
            $table->timestamp('dt_updated')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->primary(['id', 'version']);
        });

        DB::statement('ALTER TABLE legal_document_record_history ENGINE = MyISAM');
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_document_record_history');
    }
};
