<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table = 'enrollment';
    public $timestamps = false;

    protected $fillable = [
        'student_ID',
        'enroll_time',
        'Enroll_Status',
        'Bus_ID'
    ];

    public function bus()
    {
        return $this->belongsTo(BusInfo::class, 'Bus_ID', 'Bus_ID');
    }
}
