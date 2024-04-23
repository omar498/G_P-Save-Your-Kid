<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    /* use HasFactory;
    protected $table = 'supervisors';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'Full_Name',
        'Password',
        'Image',
        'Email',
        'Phone',
        'Address',
        'location',
    ]; */
    use HasFactory;

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
    /* public static function updateSupervisor($id, $data)
    {
        $supervisor = self::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Supervisor not found'], 404);
        }

        $supervisor->fill($data->toArray());
        $supervisor->save();

        return response()->json(['message' => 'Supervisor updated successfully', 'supervisor' => $supervisor], 200);
    } */
}
