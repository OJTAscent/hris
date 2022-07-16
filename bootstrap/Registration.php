<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registration';

    protected $fillable = [
        'employee_number',
        'firstname',
        'lastname',
        'streetAddress1',
        'streetAddress2',
        'city',
        'state' ,
        'phonenumber' ,
        'homenumber',
        'email',
        'birthday',
        'image_path' 
    ];
}
