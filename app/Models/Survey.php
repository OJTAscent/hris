<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'streetAdd1',
        'streetAdd2',
        'city',
        'province',
        'postal',
        'country',
        'contactNumber',
        'email',
        'exampleFormControlTextarea1',
        'exampleFormControlTextarea2',
        'exampleFormControlTextarea3',
        'exampleFormControlTextarea4',
        'exampleFormControlTextarea5',
        'exampleFormControlTextarea6'
    ];

    protected $table = 'survey';
    
}