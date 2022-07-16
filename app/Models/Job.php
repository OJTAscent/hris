<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'title',
        'department',
        'working_type',
        'start_date',
        'city',
        

    ];

    protected $table = 'jobs';
    protected $primaryKey = 'id';


    public function registration()
{
    return $this->belongsTo(Registration::class, 'employee_id', 'id');
}
}
