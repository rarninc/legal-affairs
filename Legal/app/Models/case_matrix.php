<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class case_matrix extends Model
{
    use HasFactory;
    protected $table = "case_matrix";
    protected $fillable = ["employee_name", "case_docket", "case_title", "charge", "offense", "status", "remarks", "assigned_officer", "date_issued", "date_resolved"];
    protected $primaryKey = "case_docket";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function scopeSearch($query, $value){
        $query->where('employee_name','like',"%{$value}%")
                ->orWhere('case_title','like',"%{$value}%")
                ->orWhere('case_docket','like',"%{$value}%");
    }
}
