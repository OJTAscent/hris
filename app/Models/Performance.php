<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_number',
        'firstName',
        'lastName',
        'title',
        'department',
        'supervisor',
        'dateHired'
    ];

    protected $table = 'performance';

    public function goal() {
        return $this->hasOne(PerformanceGoal::class, 'employeeID');
    }

    public function summary() {
        return $this->hasOne(PerformanceSummary::class, 'employeeID');
    }

    public function rating() {
        return $this->hasOne(PerformanceCompetencies::class, 'employeeID');
    }
}
