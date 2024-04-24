<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;

    protected $table = 'supervisor';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'Full_Name',
        'Password',
        'Image',
        'Email',
        'Phone',
        'Address',
        'location'
    ];

    public function buses()
    {
        return $this->hasMany(BusInfo::class, 'Bus_Supervisor_ID', 'ID');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'Supervisor_ID', 'ID');
    }

    public function parents()
    {
        return $this->hasManyThrough(Parents::class, Student::class, 'Supervisor_ID', 'Supervisor_ID', 'ID', 'ID');
    }
}
