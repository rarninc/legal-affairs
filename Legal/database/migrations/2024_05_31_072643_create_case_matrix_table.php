<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create case_matrix table
        Schema::create('case_matrix', function (Blueprint $table) {
            $table->string('case_docket', 8)->primary();
            $table->string('employee_name', 50);
            $table->string('case_title', 255);
            $table->string('charge', 100);
            $table->string('offense', 100);
            $table->string('assigned_officer', 50);
            $table->date('date_issued');
            $table->date('date_resolved')->nullable();
            $table->string('status', 8);
            $table->string('remarks', 255)->nullable();
            $table->timestamps();
        });

        // // Create trigger for AFTER INSERT on case_matrix
        // DB::unprepared('
        //     CREATE TRIGGER case_matrix_after_insert 
        //     AFTER INSERT ON case_matrix 
        //     FOR EACH ROW 
        //     BEGIN 
        //         INSERT INTO case_matrix_history (action, version, dt_updated, case_docket, employee_name, case_title, charge, offense, assigned_officer, date_issued, date_resolved, status, remarks)
        //         SELECT "insert", COALESCE(MAX(version) + 1, 1), NOW(), NEW.case_docket, NEW.employee_name, NEW.case_title, NEW.charge, NEW.offense, NEW.assigned_officer, NEW.date_issued, NEW.date_resolved, NEW.status, NEW.remarks
        //         FROM case_matrix_history 
        //         WHERE case_docket = NEW.case_docket
        //         GROUP BY case_docket;
        //     END
        // ');

        // // Create trigger for AFTER UPDATE on case_matrix
        // DB::unprepared('
        //     CREATE TRIGGER case_matrix_after_update 
        //     AFTER UPDATE ON case_matrix 
        //     FOR EACH ROW 
        //     BEGIN 
        //         INSERT INTO case_matrix_history (action, version, dt_updated, case_docket, employee_name, case_title, charge, offense, assigned_officer, date_issued, date_resolved, status, remarks)
        //         SELECT "update", COALESCE(MAX(version) + 1, 1), NOW(), NEW.case_docket, NEW.employee_name, NEW.case_title, NEW.charge, NEW.offense, NEW.assigned_officer, NEW.date_issued, NEW.date_resolved, NEW.status, NEW.remarks
        //         FROM case_matrix_history 
        //         WHERE case_docket = NEW.case_docket
        //         GROUP BY case_docket;
        //     END
        // ');

        // // Create trigger for BEFORE DELETE on case_matrix
        // DB::unprepared('
        //     CREATE TRIGGER case_matrix_before_delete 
        //     BEFORE DELETE ON case_matrix 
        //     FOR EACH ROW 
        //     BEGIN 
        //         INSERT INTO case_matrix_history (action, version, dt_updated, case_docket, employee_name, case_title, charge, offense, assigned_officer, date_issued, date_resolved, status, remarks)
        //         SELECT "delete", COALESCE(MAX(version) + 1, 1), NOW(), OLD.case_docket, OLD.employee_name, OLD.case_title, OLD.charge, OLD.offense, OLD.assigned_officer, OLD.date_issued, OLD.date_resolved, OLD.status, OLD.remarks
        //         FROM case_matrix_history 
        //         WHERE case_docket = OLD.case_docket
        //         GROUP BY case_docket;
        //     END
        // ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_matrix');

        // DB::unprepared('DROP TRIGGER IF EXISTS case_matrix_after_insert');
        // DB::unprepared('DROP TRIGGER IF EXISTS case_matrix_after_update');
        // DB::unprepared('DROP TRIGGER IF EXISTS case_matrix_before_delete');
    }
};



