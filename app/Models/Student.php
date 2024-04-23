<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'FullName',
        'Parent_ID',
        'Image',
        'grade',
        'class',
        'Supervisor_ID',
    ];
}
