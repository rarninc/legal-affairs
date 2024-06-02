<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pending_task extends Model
{
    use HasFactory;
    protected $table = "legal_pending_tasks";
    protected $fillable = ["id","table_name","record_id", "record_title","status","created_at","progress_no","priority"];
    public $timestamps = false;
    public $incrementing = true;
}
