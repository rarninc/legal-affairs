<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_record extends Model
{
    use HasFactory;
    protected $table = "legal_document_record";
    protected $fillable = ["id","date_received","date_released","document_title","document_type","from_office","to_office","remarks","tracking_no","progress_status","document_status"];
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    public function scopeSearch($query, $value){
        $query->where('tracking_no','like',"%{$value}%")
                ->orWhere('document_title','like',"%{$value}%")
                ->orWhere('document_type','like',"%{$value}%");
    }
}
