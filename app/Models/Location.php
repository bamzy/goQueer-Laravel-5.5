<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Location extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'location';
    public $fillable = ['address','name','description','gallery_id','user_id'];
}