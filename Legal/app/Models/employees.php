<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = ["employee_id", "first_name", "last_name", "middle_name", "current_position"];
    public $incrementing = false;

}
