<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
}
