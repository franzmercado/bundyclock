<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $table = 'employees';

  protected $fillable = [
      'employeeID', 'first_name', 'middle_name', 'last_name', 'suffix', 'gender', 'department', 'shift',
  ];
  public $timestamps = true;
}