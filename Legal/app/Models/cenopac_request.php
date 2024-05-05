<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cenopac_request extends Model
{
    use HasFactory;
    protected $table = "cenopac_request";
    protected $fillable = ["date_requested","employee_name","position","purpose","originating_office","status"];
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;

    public function scopeSearch($query, $value){
        $query->where('employee_name','like',"%{$value}%")
                ->orWhere('purpose','like',"%{$value}%")
                ->orWhere('originating_office','like',"%{$value}%")
                ->orWhere('position','like',"%{$value}%")
                ->orWhere('date_requested','like',"%{$value}%");
    }
}
