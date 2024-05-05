<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_record extends Model
{
    use HasFactory;
    protected $table = "document_record";
    protected $fillable = ["id","date_received","date_released","document_title","from_office","to_office","remarks","tracking_no"];
    public $timestamps = false;
}
