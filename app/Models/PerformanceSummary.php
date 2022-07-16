<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceSummary extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'employeeID',
        'employeeEffectivity1',
        'employeeEffectivity2',
        'textAreaQuestion1'
    ];

    protected $table = 'performance_summary';

    protected $primaryKey = 'id';
    
    public function performance() {
        return $this->belongsTo(Performance::class, 'employeeID', 'id');
    }
}
