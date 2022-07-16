<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'contact_firstname',
        'contact_lastname',
        'contact_phonenumber',
        'relationship',
        'secondcontact_fname',
        'secondcontact_lname',
        'second_phonenumber',
        'second_relationship'
    
    ];

    protected $table = 'emergencies';
    protected $primaryKey = 'id';


    /**
 */
public function registrations()
{
    return $this->belongsTo(Registration::class, 'employee_id', 'id');
}
}
