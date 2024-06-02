<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class case_matrix_history extends Model
{
    use HasFactory;
    protected $table = "case_matrix_history";
    protected $fillable = ["employee_name", "action", "remarks", "case_docket", "case_title", "charge", "offense", "status", "assigned_officer", "date_issued","version","dt_updated"];
    protected $primaryKey = ["case_docket","version"];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
