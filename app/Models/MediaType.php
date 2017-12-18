<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MediaType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media_type';
    public $fillable = ['name'];
}