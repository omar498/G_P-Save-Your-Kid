<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;
    protected $table = 'parent';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'Full_Name',
        'Password',
        'Child_Name',
        'Email',
        'Phone',
        'address',
        'Supervisor_ID'
    ];

    public function children()
    {
        return $this->hasMany(Student::class, 'Parent_ID', 'ID');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'Supervisor_ID', 'ID');
    }
}
