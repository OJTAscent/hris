<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
  use HasFactory;

  protected $table = 'registration';

  protected $primaryKey = 'id';

  protected $fillable = [
    'role_code',
    'employee_number',
    'firstname',
    'lastname',
    'streetAddress1',
    'streetAddress2',
    'city',
    'state',
    'phonenumber',
    'homenumber',
    'email',
    'birthday',
    'image_path'

  ];



  public function job()
  {
    return $this->hasOne(Job::class, 'employee_id');
  }

  public function emergency()
  {
    return $this->hasOne(Emergency::class, 'employee_id');
  }

  public static function boot()
  {
    parent::boot();

    static::created(function ($employee) {
      $employee->employee_number .= $employee->id;
      $employee->save();
    });
  }
}
