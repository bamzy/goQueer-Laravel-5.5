<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'message';
    public $fillable = ['body','title','location_id','parent_message_id','user_id'];
}