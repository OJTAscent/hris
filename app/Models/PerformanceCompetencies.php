<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceCompetencies extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeeID',
        'inlineRadioOptions',
        'comment',
        'inlineRadioOptions1',
        'comment1',
        'inlineRadioOptions2',
        'comment2',
        'inlineRadioOptions3',
        'comment3',
        'inlineRadioOptions4',
        'comment4',
        'inlineRadioOptions5',
        'comment5',
        'inlineRadioOptions6',
        'comment6',
        'inlineRadioOptions7',
        'comment7',
        'inlineRadioOptions8',
        'comment8',
        'inlineRadioOptions9',
        'comment9',
    ];

    protected $table = 'performance_competencies';

    protected $primaryKey = 'id';
    
    public function performance() {
        return $this->belongsTo(Performance::class, 'employeeID', 'id');
    }
}
