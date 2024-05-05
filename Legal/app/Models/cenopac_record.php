<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cenopac_record extends Model
{
    protected $table = "cenopac_record";
    protected $fillable = ["id","date_requested","date_issued","employee_name","position","purpose","originating_office"];
    public $timestamps = false;

    public function scopeSearch($query, $value){
        $query->where('employee_name','like',"%{$value}%")
                ->orWhere('purpose','like',"%{$value}%")
                ->orWhere('originating_office','like',"%{$value}%")
                ->orWhere('position','like',"%{$value}%");
    }
}
