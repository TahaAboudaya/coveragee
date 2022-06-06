<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'lng',
        'lat',
        'service_num',
        'phone',
        'name'

    ];
    public static function getlocation(){
        $record = DB::table('locations')->select("id", "service_num", "phone", "name", "lat", "lng", "created_at", "updated_at")->orderBy('id','asc')->get()->toArray();
        return $record; 
    }
}
