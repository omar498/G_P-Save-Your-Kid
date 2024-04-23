<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table = 'enrollments';
    protected $primaryKey = 'student_ID';

    protected $fillable = [
        'student_ID',
        'enroll_time',
        'Enroll_Status',
        'Bus_ID',
    ];
}
