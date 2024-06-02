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
        Schema::create('case_matrix_history', function (Blueprint $table) {
            $table->string('action', 8);
            $table->integer('version')->unsigned();
            $table->datetime('dt_updated')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('case_docket', 8);
            $table->string('employee_name', 50);
            $table->string('case_title', 255);
            $table->string('charge', 100);
            $table->string('offense', 100);
            $table->string('status', 8);
            $table->string('remarks', 255)->nullable();
            $table->string('assigned_officer', 50);
            $table->date('date_issued');
            $table->date('date_resolved')->nullable();

            // Define the composite primary key
            $table->primary(['case_docket', 'version']);
        });

        DB::statement('ALTER TABLE case_matrix_history ENGINE = MyISAM');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_matrix_history');
    }
};
