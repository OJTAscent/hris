<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceGoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeeID',
        'performanceGoal1',
        'performanceGoal2',
        'developmentGoal1',
        'developmentGoal2'
    ];

    protected $table = 'performance_goal';

    protected $primaryKey = 'id';
    
    public function performance() {
        return $this->belongsTo(Performance::class, 'employeeID', 'id');
    }
}
