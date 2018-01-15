<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','show','lat','lng','zoom','tilt','bearing'
    ];


}
