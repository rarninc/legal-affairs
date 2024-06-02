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
        Schema::create('legal_document_record', function (Blueprint $table) {
            $table->increments('id');
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
        });

        // DB::unprepared('
        //     CREATE TRIGGER before_document_record_insert
        //     BEFORE INSERT ON legal_document_record
        //     FOR EACH ROW
        //     BEGIN
        //         IF NEW.tracking_no NOT REGEXP "^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$" THEN
        //         SIGNAL SQLSTATE "45000"
        //         SET MESSAGE_TEXT = "Invalid tracking number format";
        //         END IF;
        //     END
        // ');
        
        // DB::unprepared('
        //     CREATE TRIGGER document_recordai AFTER INSERT ON legal_document_record 
        //     FOR EACH ROW
        //     INSERT INTO legal_document_record_history 
        //     SELECT "insert", NULL, NOW(), d.* 
        //     FROM document_record AS d WHERE d.id = NEW.id;
        // ');
        // DB::unprepared('
        //     CREATE TRIGGER document_recordau AFTER UPDATE ON legal_document_record
        //     FOR EACH ROW
        //     INSERT INTO legal_document_record_history 
        //     SELECT "update", NULL, NOW(), d.*
        //     FROM document_record AS d WHERE d.id = NEW.id;
        // ');
        // DB::unprepared('
        //     CREATE TRIGGER document_record__bd BEFORE DELETE ON legal_document_record
        //     FOR EACH ROW
        //     INSERT INTO legal_document_record_history 
        //     SELECT "delete", NULL, NOW(), d.* 
        //     FROM document_record AS d WHERE d.id = OLD.id; 
    
        // ');
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // DB::unprepared('DROP TRIGGER IF EXISTS before_document_record_insert');
        // DB::unprepared('DROP TRIGGER IF EXISTS document_recordai');
        // DB::unprepared('DROP TRIGGER IF EXISTS document_recordau');
        // DB::unprepared('DROP TRIGGER IF EXISTS document_record__bd');
        Schema::dropIfExists('legal_document_record');
    }
};
