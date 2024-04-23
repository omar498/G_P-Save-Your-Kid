<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusInfo extends Model
{
    use HasFactory;
    protected $table = 'buses_info';
    /* 
    protected $primaryKey = 'Bus_ID';

    public $timestamps = false; */

    protected $fillable = [
        'Bus_Supervisor_ID',
        'Bus_Driver_ID',
        'Bus_Line_Name',
    ];

    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor', 'Bus_Supervisor_ID', 'id');
    }

    public function driver()
    {
        return $this->belongsTo('App\Driver', 'Bus_Driver_ID', 'ID');
    }
}
