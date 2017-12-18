<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MyComment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comment';
    public $fillable = ['content','media_id','user_id'];
}