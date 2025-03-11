<?php
// app/Models/Employee.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'position',
        'salary',
        'email',
        'phone',
        'hire_date',
        'department'
    ];
}