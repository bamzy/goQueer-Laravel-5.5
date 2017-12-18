<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Discovery extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'discovery';
    public $fillable = ['location_id','player_id'];
}