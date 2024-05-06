<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_record_history extends Model
{
    use HasFactory;
    protected $table = "document_record_history";
    protected $fillable = ["id","date_received","date_released","document_title","document_type","from_office","to_office","remarks","tracking_no","version","dt_updated","status"];
    protected $primaryKey = ["id","version"];
    public $timestamps = false;
}
