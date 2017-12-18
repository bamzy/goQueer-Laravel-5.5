<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Media extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media';
    public $fillable = ['source','description','type_id','user_id','name','filePath'];
}