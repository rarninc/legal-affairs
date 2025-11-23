<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drs_documents extends Model
{
    use HasFactory;
    protected $table = "drs_documents";
    protected $fillable = ["id", "tracking_number", "title", "type", "status", "action", "author", "originating_office", "current_office", "designated_office",
                            "file_attach", "drive", "remarks", "received_by", "released_by", "terminal_by", "created_at", "updated_at" ];
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;
}
