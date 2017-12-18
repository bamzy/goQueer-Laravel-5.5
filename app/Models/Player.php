<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Player extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'player';
    public $fillable = ['deviceId','user_id'];
}